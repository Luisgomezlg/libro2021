<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $fecha = Carbon::now();

        DB::table('roles')->insert([
            [
                'name_rol' => 'Administrativo',
                'description_rol' => 'Permiso para toda ejecucion',
            ],
            [
                'name_rol' => 'Operativo',
                'description_rol' => 'Permiso para ejecuciones basicas',
            ]
        ]);

        DB::table('users')->insert([
            [
                'name' => 'Luis',
                'lastName' => 'Gomez',
                'email' => 'luis@gmail.com',
                'password' => Hash::make('holamundo'),
                'id_rol' => 1,
                'state' => 60,
                'number_company' => 123,
            ],
            [
                'name' => 'Hernesto',
                'lastName' => 'Gonzales',
                'email' => 'hernesto@gmail.com',
                'password' => Hash::make('holamundo'),
                'id_rol' => 2,
                'state' => 60,
                'number_company' => 246,
            ],
            [
                'name' => 'Osvaldo',
                'lastName' => 'Laurido',
                'email' => 'olaurido@gmail.com',
                'password' => Hash::make('holamundo'),
                'id_rol' => 2,
                'state' => 60,
                'number_company' => 12345,
            ]
        ]);
        DB::table('categorias')->insert([
            [
                'title' => 'Administración De Proyectos',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Análisis De Procesos',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Análisis Organizacional',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Desarrollo',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Despliegue',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Diseño Arquitecura',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Ejecutoria',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Garantia de Calidad',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Modelaje De Datos',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Planificación Estratégica',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ],
            [
                'title' => 'Recopilación De Requerimentos',
                'image' => '',
                'creation_date' => $fecha,
                'id_user' => 1,
            ]
        ]);
        DB::table('metodos')->insert([

            [
                'first_cod' => '1',
                'ind_cod' => '',
                'title' => 'IMPLEMENTE LA VERTIENTE DE VALOR E-INGENIADA BIR',
                'description' => 'El objetivo de esta etapa es planificar la implementación de la vertiente de valor rediseñada y poner en funcionamiento la misma.
                                  La implementación debe considerar los aspectos del cambio organizacional: gerencial, operativa, social y tecnológico.  
                                  Las comunicaciones con todos los aspectos de la organización involucradas o impactadas por el cambio son críticas en este punto.
                                  El desarrollo de un plan de transición cohesivo y coordinado es el primer paso en la implementación. 
                                  Esto es seguido por la preparación de la organización para el cambio y, finalmente, por la implementación, en sí misma.',
                'image_met' => '',
                'creation_date' => $fecha,
                'level' => '1',
                'order' => '1',
                'id_user' => 1,
            ],
            [
                'first_cod' => '1',
                'ind_cod' => '1.1',
                'title' => 'Desarrollar Plan De Transición BIR S-0100',
                'description' => 'El propósito de este paso es desarrollar un plan de transición para lograr el cambio en la organización. 
                                  El plan de transición debe mantener cuatro vistas paralelas una al lado de la otra. 
                                  Estos puntos de vista enfocan la transición desde las perspectivas gerencial, operativa, sistemas sociales y tecnológica.
                                  El plan de transición también incluye componentes para las instalaciones y un pronóstico de mejora anticipada en los resultados de la Organización. 
                                  Además, un plan de comunicaciones es esencial para garantizar que las unidades organizativas involucradas se mantengan al tanto de los cambios que se planifican y cómo se verán afectados.
                                  Establecer la secuencia correcta de cambio es fundamental ya que el plan de transición puede ser complejo y los diversos componentes están interrelacionados. 
                                  El plan de transición se basa en la estrategia de implementación y el programa de cambio de secuencia comercial que se definió previamente.',
                'image_met' => '',
                'creation_date' => $fecha,
                'level' => '2',
                'order' => '2',
                'id_user' => 1,
            ],
            [
                'first_cod' => '1',
                'ind_cod' => '1.1.1',
                'title' => 'Desarrollar Un Plan De Cambio Operacional BIR S-0100 T-010',
                'description' => 'El objetivo de esta etapa es planificar la implementación de la vertiente de valor rediseñada y poner en funcionamiento la misma.
                                  La implementación debe considerar los aspectos del cambio organizacional: gerencial, operativa, social y tecnológico.  
                                  Las comunicaciones con todos los aspectos de la organización involucradas o impactadas por el cambio son críticas en este punto.
                                  El desarrollo de un plan de transición cohesivo y coordinado es el primer paso en la implementación. 
                                  Esto es seguido por la preparación de la organización para el cambio y, finalmente, por la implementación, en sí misma.',
                'image_met' => '',
                'creation_date' => $fecha,
                'level' => '3',
                'order' => '2',
                'id_user' => 1,
            ],
            [
                'first_cod' => '4',
                'ind_cod' => '',
                'title' => 'E-INGENIERÍA VERTIENTE DE VALOR BRV',
                'description' => 'El objetivo de esta etapa es la de reinventar la vertiente de valor de tal forma que se satisfagan las necesidades del cliente y mejoren las operaciones de la organización.  Es esencial que ambos aspectos sean considerados durante la e-Ingeniería, ya que ambos aspectos se esperan sea resultados del proceso. Las soluciones que solo enfocan uno de los aspectos no ayudan a la organización en alcanzar los objetivos.
                                  La etapa de e-Ingeniería comienza con la exploración de ideas radicales para proveer el nivel de mejoras esperada y continua a través del proceso de e-Ingeniería de la vertiente de valor. Esto está acompañado por actividades de evaluación comparativa del cual surgen y se incorporan nuevas ideas y conceptos en la vertiente de valor. La etapa termina con una evaluación del impacto de la e-Ingeniería en la organización desde el punto de vista de negocio, técnico, costo, desarrollo de la estrategia y análisis de riesgo.
                                  Al mismo tiempo que la e-Ingeniería operacional se lleva a cabo, la organización se prepara para el cambio organizacional y cultural.  La estructura organizacional es reinventada, así como los cambios del sistema social de la organización.  Adicionalmente cualquier cambio en la estructura física, localizaciones de trabajo, muebles, y equipos son planificados y diseñados.',
                'image_met' => '',
                'creation_date' => $fecha,
                'level' => '1',
                'order' => '1',
                'id_user' => 1,
            ],
            [
                'first_cod' => '4',
                'ind_cod' => '1.1',
                'title' => 'Conducir Evaluación Comparativa BRV S-0100',
                'description' => 'El objetivo de este paso es realizar una evaluación comparativa de las mejores prácticas en la industria. Esta es una parte esencial de las actividades de e-Ingeniería. En la evaluación comparativa, la Organización y sus prácticas operativas se comparan con otras Organizaciones de clase mundial, lo que permite que el equipo de e-Ingeniería obtenga nuevas ideas y conocimientos sobre la vertiente de valor en el proceso. Además, le permite al equipo incorporar las mejores prácticas, nuevas ideas y nuevos conceptos, obtenidos de socios de referencia, en la vertiente de valor rediseñada.
                La evaluación comparativa es valiosa porque muestra que las ideas que son radicales para la Organización se consideran razonables y pueden estar funcionando en otras compañías. Como un control de la realidad, aumenta la confianza del equipo de e-Ingeniería en la viabilidad de su trabajo y ayuda a ganar credibilidad con la administración de la Organización. Realizar una evaluación comparativa en un momento anterior puede ser confuso porque no hay contexto para determinar si la nueva idea es o no apropiada.
                Se debe mantener el proceso de evaluación comparativa y las relaciones desarrolladas con los socios de referencia, ya que la evaluación comparativa se llevará a cabo como un proceso continuo para medir el rendimiento una vez que se implemente la vertiente de valor rediseñada.',
                'image_met' => '',
                'creation_date' => $fecha,
                'level' => '2',
                'order' => '2',
                'id_user' => 1,
            ],
            [
                'first_cod' => '4',
                'ind_cod' => '1.1.1',
                'title' => 'E-INGENIERÍA VERTIENTE DE VALOR BRV',
                'description' => 'El equipo de e-Ingeniería debe comprender lo que espera obtener de la evaluación antes de ejecutar la evaluación comparativa y antes de ponerse en contacto con fuentes externas. 
                                  El equipo debe identificar sus metas y objetivos y tenerlos claramente en cuenta durante el proceso. 
                                  El equipo de e-Ingeniería debe tener una visión clara de cómo las actividades de evaluación comparativa les ayudarán a confirmar sus conceptos de e-Ingeniería o mejorarlos aún más.',
                'image_met' => '',
                'creation_date' => $fecha,
                'level' => '3',
                'order' => '2',
                'id_user' => 1,
            ]
        ]);

        DB::table('tecnicas')->insert([
            'categoria_id' => 1,
            'first_cod_tec' => '1',
            'ind_cod_tec' => '',
            'title_tec' => 'Administración Cuestionarios',
            'description_tec' => 'Esta técnica permite la recopilación de gran cantidad de datos en un período corto de tiempo. 
            Hay dos tipos de cuestionarios: cerrados, donde las respuestas a las preguntas son provistas como selección múltiple o escala; 
            y abiertas donde los que contestan son motivados a contestar libremente sin estructuras.            ',
            'image_tec' => '',
            'creation_date' => $fecha,
            'level' => '1',
            'order' => '1',
            'id_user' => 1,

        ]);
        $this->call([
            UserSeeder::class,
            RolesSeeder::class
        ]);
    }
}
