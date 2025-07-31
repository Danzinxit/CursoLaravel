<?php
//MODEL PARA SE COMUNICAR COM A TABELA
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; //Model de eventos no controller
use App\Models\User; //Model de usuarios no controller

class EventController extends Controller
{
    public function index(){
        $search = request('search');

        if($search){//se a busca estiver preenchida ira retornar isso
            $events = Event::where([
                ['title', 'like' , '%'.$search.'%'] //like para pegar o % para ver oque pode ter na frente ou atras da plavra
            ])->get();//where para filtrar  as pesquisas
//metodo get para trazeer o dados

        }else{ //se nao ira para tela inicial
            $events = Event::all();
        }

        /*  $events = Event::all(); //usar todos os eventos URM do banco aqui */

    return view('welcome',['events' => $events , 'search' => $search]);
    }

    //action create
    public function create(){
        return view('events.create'); //separar views
        //separar em controllers das views em pastas
    }

    //enviar dados do formulario para o banco :
    public function store(Request $request){ //o request vai trazer tudo da view create que e do formulario
      $event = new Event;

      $event->title = $request->title;
      $event->city = $request->city;
      $event->private = $request->private;
      $event->description = $request->description;
      $event->items = $request->items;
      $event->date = $request->date;

      // Lógica para upload de imagem
      // Verifica se um arquivo de imagem foi enviado no formulário e se o upload é válido.
      if ($request->hasFile('image') && $request->file('image')->isValid()) {

          // Pega o arquivo de imagem que veio na requisição.
          $requestImage = $request->image;

          // Pega a extensão do arquivo (ex: jpg, png).
          $extension = $requestImage->extension();

          // Cria um nome de arquivo único para a imagem para evitar nomes duplicados.
          $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;

          // Move o arquivo de imagem para o diretório 'public/img/events'.
          $requestImage->move(public_path('img/events'), $imageName);

          // Atribui o nome da imagem ao campo 'image' do objeto $event, para ser salvo no banco.
          $event->image = $imageName;
      }

      $user = auth()->user(); // Pega o usuário logado
      $event->user_id = $user->id; //pega o id do usuario


      $event->save(); //para salvar no banco

      //REDIRIONAR PARA UMA PAGINA QUE E A HOME
      return redirect('/')->with('msg' , 'Evento criado com sucesso!') ;
    }
    public function contact(Request $request){
            $contact = new Event;
    }

    public function show($id){
        $event = Event::findOrFail($id);

        //ISSO E PARA SABER O DONO DO EVENTO:
        $eventOwner = User::where('id', $event->user_id)->first()->toArray(); //pega o dono do evento //toArray e para transformar aqueles dados em arrays

        return view('events.show' , ['event' => $event, 'eventOwner' => $eventOwner]); //esse event e da model Event
    }


}




























/*   public function index(){
         $array = [1,2,3,4,5];
    $array2 = ["MG","SP", "RJ", "ES"];//foreach
    $vetor = ["MG" => "Minas Gerais" ,"SP" => "Sao paulo", "RJ" => "Rio de Janeiro", "ES" => "Espirito Santo"];//foreach 2
    $idade = 18;
    $nome = "Daniel";
    $trabalho = 'DEV FULL STACK';
 */


/*   return view('welcome',
    [
    'array'=>$array,
    'array2'=>$array2,
    'vetor'=>$vetor,
    'nome'=> $nome,
    'idade'=>$idade,
    'trabalho'=>$trabalho    //puxa da api e da view welcome.blade.php
    ]); */
