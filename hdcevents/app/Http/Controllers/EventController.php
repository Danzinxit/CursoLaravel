<?php
//MODEL PARA SE COMUNICAR COM A TABELA
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event; //Model de eventos no controller

class EventController extends Controller
{
    public function index(){
         $events = Event::all(); //usar todos os eventos URM do banco aqui

    return view('welcome',['events' =>$events]);
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

      $event->save(); //para salvar no banco

      //REDIRIONAR PARA UMA PAGINA QUE E A HOME
      return redirect('/')->with('msg' , 'Evento criado com sucesso!') ;
    }
    public function contact(Request $request){
            $contact = new Event;
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
