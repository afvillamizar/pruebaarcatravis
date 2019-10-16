<?php

namespace backend\tests\unit\controllers\poc;

use Yii;
use backend\controllers\poc\FdClasificacionPreguntaControllerFachada;
/**
 * FdClasificacionPreguntaControllerFachadaTest implementa la verificaicon de los valores, consulta información para aplicar reglas de negocio, y transacciones conforme las acciones para el modelo FdClasificacionPregunta.
 */
class FdClasificacionPreguntaControllerFachadaTest extends \Codeception\Test\Unit
{

/**para mayor informacion sobre asserts => http://codeception.com/docs/modules/Asserts y http://codeception.com/10-04-2013/specification-phpunit.html**/
    
    public function _before()
    {
       // declaraciones y asignacion de valores que se deben tener para realizar las funciones test
    }

                                                               
                                                                                             
    public function _after()                                                              
    {             
            // funcion que se ejecuta despues de los test                                                      
    }                
    
 
    public function testBehaviors()
    {
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);
        
        //Se realiza el llamado a la funcion
        $behaviors= $tester->behaviors();
        
        // Se evalua el caso exitoso
        $this->assertNotEmpty($behaviors,                                                          
            'Se devolvio vacio behaviors');  
            
    }
	
	
    /**Accion para la barra de progreso y render de nuevo a la vista
    Ubicación: @web = frontend\web....*/

    public function testActionProgress(){

        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);

        // Se declaran las variables, $urlroute=null,$id=null para el reenvio de la barra de progreso, la llave tiene valor por defecto null, si se desea se puede cambiar por una llave. 
         $urlroute='/fdclasificacionpregunta/index';
         $id=null;
        //Se obtiene los valores para la barra de progreso
           $progressbar= $tester->actionProgress($urlroute,$id);
        //Se evalua caso exitoso   
        $this->assertNotEmpty($progressbar,
           'Se devolvio Vacio el html de actionProgress ');  

    }

	
	
    /**
     * Listado todos los datos del modelo FdClasificacionPregunta que se encuentran en el tablename.
     * @return mixed
     */
    public function testActionIndex()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);
        
        
        // Se declaran los $queryParams a enviar
            $queryParams = ['FdClasificacionPreguntaSearch' => [
                                             'valor' => "Ingresar valor de pruebas para el campo valor de tipo varchar",       
                                              'id_clasificacion' => "Ingresar valor de pruebas para el campo id_clasificacion de tipo int4",       
                                              'id_pregunta' => "Ingresar valor de pruebas para el campo id_pregunta de tipo int4",       
                              ]];
             
       
        // Se obtiene el resultado de action index
                $actionindex= $tester->actionIndex($queryParams);
                         
              // se evaluan los casos exitosos
                $this->assertNotNull($actionindex['dataProvider'],                                                          
                    'Se devolvio nullo dataProvider de actionIndex ');  
                $this->assertNotNull($actionindex['searchModel'],                                                          
                    'Se devolvio nullo searchModel de actionIndex '); 
                    

                            
    }

    /**
     * Presenta un dato unico en el modelo FdClasificacionPregunta.
     * @param integer $id_clasificacion
     * @param integer $id_pregunta
     * @return mixed
     */
    public function testActionView()
    {       
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);
    
        // se deben declarar los valores de $id_clasificacion, $id_pregunta        
                        $id_clasificacion = 'valor adecuado para el tipo de dato del paramtero $id_clasificacion';
                 $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
              
        
             // se realiza el action view, intrernamente usa la funcion findModel, a su vez utiliza el findone de Yii realizando la consulta con todos los valores de los parametros $id_clasificacion, $id_pregunta             
             $actionView= $tester->actionView($id_clasificacion, $id_pregunta);
             
             // se evalua el caso exitoso
             $this->assertNotNull($actionView,
                    'Se devolvio nullo actionView ');  
 
    }

    /**
     * Crea un nuevo dato sobre el modelo FdClasificacionPregunta .
     * Si se crea correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado.
     * @return mixed
     */
    public function testActionCreate()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);
             
            // Se declaran el rquest
              $request =  ['FdClasificacionPreguntaControllerFachada' => [
                                'valor' => 'Ingresar valor de pruebas para el campo valor de tipo varchar',
                             'id_clasificacion' => 'Ingresar valor de pruebas para el campo id_clasificacion de tipo int4',
                             'id_pregunta' => 'Ingresar valor de pruebas para el campo id_pregunta de tipo int4',
                          ]];
            
                $actionCreate = $tester->actionCreate($request,false);
                
                // se evaluan que se devuleva la informacion          
                $this->assertCount(0,$actionCreate['model']['_errors'],                                                          
                        'Se devolvieron errores en el model de actionCreate, verifique por favor');   
                $this->assertNotEmpty($actionCreate['create'],                                                          
                        'Se devolvio nulo el create de actionCreate '); 
                        
        /**Para imprimir los errores 
         * $this->assert($actionCreate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/


    }

   
     /**
     * Modifica un dato existente en el modelo FdClasificacionPregunta.
     * Si se modifica correctamente guarda setFlash, presenta la barra de progreso y envia a view con la confirmación de guardado..
     * @param integer $id_clasificacion
     * @param integer $id_pregunta
     * @return mixed
     */
    public function testActionUpdate($id_clasificacion, $id_pregunta)
    {
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);
        
         // Se declaran el rquest
              $request =  ['FdClasificacionPreguntaControllerFachada' => [
                                'valor' => 'Ingresar valor de pruebas para el campo valor de tipo varchar',
                             'id_clasificacion' => 'Ingresar valor de pruebas para el campo id_clasificacion de tipo int4',
                             'id_pregunta' => 'Ingresar valor de pruebas para el campo id_pregunta de tipo int4',
                          ]];
        
        
        //se valida que sea exitoso
        $actionUpdate= $tester->actionUpdate($id_clasificacion, $id_pregunta,$request,false);
        $this->assertCount(0,$actionUpdate['model']['_errors'],                                                                                                    
                        'Se devolvieron errores en el model de actionUpdate, verifique por favor');  
        $this->assertNotEmpty($actionUpdate['update'],                                                          
                'Se devolvio nulo el create de actionUpdate '); 

                
        /**Para imprimir los errores 
         * $this->assert($actionUpdate['model']['_errors'],
                        'Se devolvieron errores en el model de actionCreate, verifique por favor')***/

        
    }

    
     /**
     * Deletes an existing FdClasificacionPregunta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_clasificacion
     * @param integer $id_pregunta
     * @return mixed
     */
    public function testActionDeletep()
    {
    
        //Se declara el objeto a verificar
        $tester = new  FdClasificacionPreguntaControllerFachada();
        // se valida que se cree la instancia exitosamente
        $this->assertTrue($tester!=null);
        $this->assertInstanceOf('backend\controllers\poc\FdClasificacionPreguntaControllerFachada', $tester);
        
        
        // se deben llenar los siguientes valores
                        $id_clasificacion = 'valor adecuado para el tipo de dato del paramtero $id_clasificacion';
                 $id_pregunta = 'valor adecuado para el tipo de dato del paramtero  $id_pregunta';
                
        // se valida que se pueda realizar el borrado del registro
        expect($tester->actionDeletep($id_clasificacion, $id_pregunta));

    }
    

}
