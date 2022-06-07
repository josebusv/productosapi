<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Http\Response;

class ProductoController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Retorna el listado de todos los productos
     * @return Illuminate\Http\Response
     */
    public function index()
    {

        $productos = Producto::all();

        return $this->successResponse($productos);

    }

    /**
     * Crea una instancia de producto
     */

     public function store(Request $request)
     {
         /***
          * define las reglas de validacion para la creacion de un prodcuta
          */
        $rules = [
            'nombre' => 'required|min:1',
            'descripcion' => 'required|min:1',
            'precio' => 'required|min:1'
        ];


        /**
         * Valida el request
         */
        $this->validate($request, $rules);

        /**
         * crea el registro de un producto en la base de datos
         */
        $producto = Producto::create($request->all());

        /**
         * retorna la instancia creada
         */
        return $this->successResponse($producto, Response::HTTP_CREATED);
     }

    /**
     * Returna una instancia especifica de producto
     * @return Illuminate\Http\Response
     */
    public function show($producto)
    {
		
        $producto = Producto::findOrFail($producto);

        return $this->successResponse($producto);
    }

    /**
     * Actualiza una instancia de producto
     */
    public function update(Request $request, $producto)
    {
        /***
          * define las reglas de validacion para la actualizacion de un producto
          */
          $rules = [
            'nombre' => 'required|min:1',
            'descripcion' => 'required|min:1',
            'precio' => 'required|min:1'
        ];

        

        /**
         * ejecuta las reglas de validacion
         */
        $this->validate($request, $rules);

        /**
         * actualiza el registro de un producto en la base de datos
         */
        $producto = Producto::findOrFail($producto);

        $producto->fill($request->only(['nombre', 'descripcion', 'descripcion_larga', 'precio']));

        /**
         * valida que almenos un valor tenga cambios para hacer la actualizacion
         */
        if($producto->isClean()){
            return $this->errorResponse('At least one vlue must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $producto->save();
        /**
         * retorna la instancia creada
         */
        return $this->successResponse($producto);
    }

    public function destroy($producto)
    {

         $producto = Producto::findOrFail($producto);
         $producto->delete();

        return $this->successResponse($producto);
    }

}
