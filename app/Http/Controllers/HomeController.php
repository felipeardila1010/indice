<?php namespace Course\Http\Controllers;

use Course\Http\Requests\Validate;
use Course\Index;
class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$valores = Index::where('user_id','=',\Auth::user()->id)->orderBy('updated_at', 'desc')->paginate(12);
		$form_data = ['route' => 'index', 'method' => 'post'];
		return view('home',compact('form_data','valores'));
	}

	public function postIndex(Validate $request)
	{
		$weight = (floatval($request->get('weight')));
		$height = floatval($request->get('height'));
		$height_t = pow(floatval($request->get('height')),2);
		$resultado = $weight/$height_t;
		$respuesta = "";
		if($resultado<16.0)
		{
			$respuesta = "Infrapeso: Delgadez Severa";
		}
		else if($resultado>=16.0 && $resultado<16.99)
		{
			$respuesta = "Infrapeso: Delgadez moderada";
		}
		else if($resultado>=17.0 && $resultado<18.49)
		{
			$respuesta = "Infrapeso: Delgadez aceptable";
		}
		else if($resultado>=18.50 && $resultado<24.99)
		{
			$respuesta = "Peso Normal";
		}
		else if($resultado>=25.00 && $resultado<29.99)
		{
			$respuesta = "Peso Normal";
		}
		else if($resultado>=30.00 && $resultado<34.99)
		{
			$respuesta = "Obeso: Tipo I";
		}
		else if($resultado>=35.00 && $resultado<40.00)
		{
			$respuesta = "Obeso: Tipo II";
		}
		else if($resultado>=40.00)
		{
			$respuesta = "Obeso: Tipo III";
		}
		Index::create(['weight' => $weight , 'height' => $height , 'user_id' => \Auth::user()->id]);
		return redirect('home')->with('resultado' , "Valor del índice: ".$resultado."<br><b>".$respuesta."</b>");
		
	}

}
