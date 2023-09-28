<?php

namespace App\Console\Commands\Module;

use App\Console\CommandTemplates\CreateModuleTemplate;
use App\Console\GetCommandPath\GetModulePath;
use App\Console\GetCommandPath\GetStubsPath;
use App\Traits\CommandHelpers;
use Exception;
use Illuminate\Console\Command as CommandAlias;
use Illuminate\Support\Str;
class CreateModule extends CreateModuleTemplate
{
    use CommandHelpers;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}

                                        {--all}
                                        {--angular}
                                        {--react}
                                        {--vue}
                                        {--storerequest}
                                        {--updaterequest}
                                        {--controller}
                                        {--model}
                                        {--event}
                                        {--jobs}
                                        {--listener}
                                        {--service}
                                        {--repository}
                                        {--resource}
                                        {--migration}
                                        {--factory}
                                        {--seeder}
                                        {--test}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'ETA: Module Created Success Fully!';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        if ($this->option('all'))
        {
            $this->input->setOption('angular', true);
            $this->input->setOption('react', true);
            $this->input->setOption('vue', true);
            $this->input->setOption('storerequest', true);
            $this->input->setOption('updaterequest', true);
            $this->input->setOption('controller', true);
            $this->input->setOption('model', true);
            $this->input->setOption('event', true);
            $this->input->setOption('jobs', true);
            $this->input->setOption('listener', true);
            $this->input->setOption('service', true);
            $this->input->setOption('repository', true);
            $this->input->setOption('resource', true);
            $this->input->setOption('migration', true);
            $this->input->setOption('factory', true);
            $this->input->setOption('seeder', true);
            $this->input->setOption('test', true);
        }

        if ($this->option('angular'))
        {
            $this->createAngularComponent();
        }

        if ($this->option('react'))
        {
            $this->createReactComponent();
        }

        if ($this->option('vue'))
        {
            $this->createVueComponent();
        }

        if ($this->option('storerequest'))
        {
            $this->createStoreRequestComponent();
        }

        if ($this->option('updaterequest'))
        {
            $this->createUpdateRequestComponent();
        }

        if ($this->option('controller'))
        {
            $this->createControllerComponent();
        }

        if ($this->option('model'))
        {
            $this->createModelComponent();
        }

        if ($this->option('resource'))
        {
            $this->createResourceComponent();
        }

        if ($this->option('event'))
        {
            $this->createEventComponent();
        }

        if ($this->option('jobs'))
        {
            $this->createJobsComponent();
        }

        if ($this->option('listener'))
        {
            $this->createListenerComponent();
        }

        if ($this->option('service'))
        {
            $this->createServiceComponent();
        }

        if ($this->option('repository'))
        {
            $this->createRepositoryComponent();
        }

        if ($this->option('migration'))
        {
            $this->createMigrationComponent();
        }

        if ($this->option('factory'))
        {
            $this->createFactoryComponent();
        }

        if ($this->option('seeder'))
        {
            $this->createSeederComponent();
        }

        if ($this->option('test'))
        {
            $this->createTestComponent();
        }

        return CommandAlias::SUCCESS;
    }


    /**
     * @return void
     */

    protected function createAngularComponent(): void
    {
        $AngularPath = GetModulePath::getAngularPath($this->argument('name'));
        $AngularComponent = Str::studly(class_basename($this->argument('name')));

        try {

            if ($this->alreadyExists($AngularPath))
            {
                $this->error('ETA:  Angular Component already exists!');
            } else {
                $this->makeDirectory($AngularPath);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::ANGULAR_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'DummyComponent',
                    ],
                    [
                        $AngularComponent,
                    ],
                    $stub
                );
                $this->Filesystem->put($AngularPath, $stub);
                $this->info('ETA:  Angular Component already exists!');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createReactComponent(): void
    {
        $ReactPath = GetModulePath::getReactPath($this->argument('name'));
        $ReactComponent = Str::studly(class_basename($this->argument('name')));

        try {

            if ($this->alreadyExists($ReactPath))
            {
                $this->error('ETA:  React Component already exists!');
            } else {
                $this->makeDirectory($ReactPath);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::REACT_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'DummyComponent'
                    ],
                    [
                        $ReactComponent,
                    ],
                    $stub
                );
                $this->Filesystem->put($ReactPath, $stub);
                $this->info('ETA:  React Component Created Success Fully!');
            }

        } catch (Exception $e) {
            $this->error( $e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createVueComponent(): void
    {
        $VuePath = GetModulePath::getVuePath($this->argument('name'));
        $VueComponent = Str::studly(class_basename($this->argument('name')));

        try {

            if ($this->alreadyExists($VuePath))
            {
                $this->error('ETA:  Vue Component already exists!');
            } else {
                $this->makeDirectory($VuePath);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::VUE_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'DummyComponent',
                    ],
                    [
                        $VueComponent,
                    ],
                    $stub
                );
                $this->Filesystem->put($VuePath, $stub);
                $this->info('ETA:  Vue Component Created Success Fully!');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createStoreRequestComponent(): void
    {
        $Storerequest = Str::studly(class_basename($this->argument('name')));
        $path = GetModulePath::getStoreRequestPath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('ETA:  Main Request already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::STORE_REQUEST_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'StoreRequestSpace',
                        'StoreReqeustClassName',
                    ],
                    [
                        "App\\Modules\\".trim($this->argument('name'))."\\Request",
                        "Store".$Storerequest.'Request',
                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Main Request created success fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createUpdateRequestComponent(): void
    {
        $Updateerequest = Str::studly(class_basename($this->argument('name')));
        $path = GetModulePath::getUpdateRequestPath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('ETA:  Main Request already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::UPDATE_REQUEST_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'UpdateRequestSpace',
                        'UpdateReqeustClassName',
                    ],
                    [
                        "App\\Modules\\".trim($this->argument('name'))."\\Request",
                        "Update".$Updateerequest.'Request',
                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Update Request created success fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createControllerComponent(): void
    {
        $path = GetModulePath::getControllerPath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('Controller already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::CONTROLLER_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'DummyControllerSpace',
                        'DummyControllerClassName',
                        'ModelPath',
                        'ModelName',
                        'ServicePath',
                        'ServiceName',
                        'RequestPathName',
                        'RequestPathName',
                        'StoreRequestClassName',
                        'UpdateRequestClassName',
                        'DummyControllerClassName',
                        'SwaggerName',
                        'swaggernameId',
                    ],
                    [
                        "App\\Modules\\".$this->argument('name')."\\Controller",
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        "Update".$this->argument('name')."Request",
                        "Store".$this->argument('name')."Request",
                        $this->argument('name'),
                        $this->argument('name'),
                        lcfirst($this->argument('name')).'s',
                        $this->argument('name').'_id',
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),

                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Controller Created success fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createModelComponent(): void
    {
        $path = GetModulePath::getModelPath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('ETA:  Model already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::MODEL_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'NameMODF',
                        'CrudGenerator',
                        'ModelClass',
                        'Tables',
                    ],
                    [
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        lcfirst($this->argument('name'))."s",
                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Model Created Success Fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createServiceComponent(): void
    {
        $path = GetModulePath::getServicePath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('ETA:  Service already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::SERVICE_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'ServiceSpace',
                        'NameFolder',
                        'NameService',
                        'ServiceNameClass',
                        'ClassNameRepository',
                    ],
                    [
                        "App\\Modules\\". $this->argument('name')."\\Service",
                        $this->argument('name'),
                        $this->argument('name')."Repository",
                        $this->argument('name')."Service",
                        $this->argument('name')."Repository",
                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Service Created Success Fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createRepositoryComponent(): void
    {
        $path = GetModulePath::getRepositoryPath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('ETA:  Repository already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::REPOSITORY_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'NameR',
                        'NameMFolder',
                        'NameM',
                        'RepositoryClassName',
                        'FunctionModelName',
                    ],
                    [
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name'),
                        $this->argument('name')."Repository",
                        $this->argument('name'),
                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Repository Created Success Fully! ');
            }

        } catch (Exception $e) {
            $this->error( $e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createResourceComponent(): void
    {
        $path = GetModulePath::getResourcesPath($this->argument('name'));

        try {

            if ($this->alreadyExists($path))
            {
                $this->error('ETA:  Resource already exists! ');
            } else {
                $this->makeDirectory($path);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::RESOURCE_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'ResourcesSpace',
                        'DummyClassName',
                    ],
                    [
                        "App\\Modules\\".$this->argument('name')."\\Resources",
                        $this->argument('name'),
                    ],
                    $stub
                );
                $this->Filesystem->put($path, $stub);
                $this->info('ETA:  Resource Created Success Fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function createEventComponent(): void
    {
        $EventPath = GetModulePath::getEventPath($this->argument('name'));

        try {

            if ($this->alreadyExists($EventPath))
            {
                $this->error('ETA:  Events already exists! ');
            } else {
                $this->makeDirectory($EventPath);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::EVENT_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'SpaceName',
                        'ClassName',
                    ],
                    [
                        $this->argument('name'),
                        $this->argument('name')."Event",
                    ],
                    $stub
                );
                $this->Filesystem->put($EventPath, $stub);
                $this->info('ETA:  Events Created Success Fully! ');
            }

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createJobsComponent(): void
    {
        $JobPath = GetModulePath::getJobsPath($this->argument('name'));

        try {
            if ($this->alreadyExists($JobPath))
            {
                $this->error('ETA:  Jobs already exists! ');
            } else {
                $this->makeDirectory($JobPath);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::JOBS_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'SpaceName',
                        'SAYANG',
                    ],
                    [
                        $this->argument('name'),
                        $this->argument('name'),
                    ],
                    $stub
                );
                $this->Filesystem->put($JobPath, $stub);
                $this->info('ETA:  Jobs Created Success Fully! ');
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createListenerComponent(): void
    {
        $ListenerPath = GetModulePath::getListenerPath($this->argument('name'));

        try {

            if ($this->alreadyExists($ListenerPath))
            {
                $this->error('ETA:  Listener already exists! ');
            } else {
                $this->makeDirectory($ListenerPath);
                $stub = $this->Filesystem->get(base_path(GetStubsPath::LISTENER_COMPONENT_STUB));
                $stub = str_replace(
                    [
                        'SpaceName',
                        'SAYANG',
                    ],
                    [
                        $this->argument('name'),
                        $this->argument('name'),
                    ],
                    $stub
                );
            }
            $this->Filesystem->put($ListenerPath, $stub);
            $this->info('ETA:  Listener Created Success Fully! ');

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createMigrationComponent(): void
    {
        $table = Str::plural(Str::snake(class_basename($this->argument('name'))));

        try{
            $this->call('make:migration', [
                'name' => "create_{$table}_table",
                '--create' => $table,
            ]);
        } catch (Exception $e){
            $this->error( "ETA:  Migration already exists! ", $e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createFactoryComponent(): void
    {
        $factory = Str::plural(Str::snake(class_basename($this->argument('name'))));

        try {
            $this->call('make:factory', [
                'name' => ucfirst("{$factory}Factory"),
            ]);
        } catch (Exception $e) {
            $this->error("ETA:  Factory already exists! ",$e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createSeederComponent(): void
    {
        $seeder = Str::plural(Str::snake(class_basename($this->argument('name'))));

        try {
            $this->call('make:seeder', [
                'name' => ucfirst("{$seeder}Seeder"),
            ]);
        } catch (Exception $e) {
            $this->error("ETA:  Seeder already exists! ", $e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function createTestComponent(): void
    {
        $testTypes = ['Index', 'Store', 'Show', 'Update', 'Delete'];
        $testMethods = ['get', 'post', 'get', 'put', 'delete'];

        try {

            foreach ($testTypes as $index => $testType) {
                $path = GetModulePath::getTestPath($this->argument('name'), $testType, $testMethods);

                if ($this->alreadyExists($path)) {
                    $this->error('ETA: Tests already exist! ');
                } else {
                    $this->makeDirectory($path);
                    $stub = $this->Filesystem->get(base_path(GetStubsPath::TEST_COMPONENT_STUB));
                    $stub = str_replace(
                        [
                            'FolderName',
                            'TestClass',
                            'RouteName',
                            'RequestMethod',
                        ],
                        [
                            $this->argument('name'),
                            "get{$testType}RequestTest",
                            lcfirst($this->argument('name')),
                            $testMethods[$index],
                        ],
                        $stub
                    );
                    $this->Filesystem->put($path, $stub);
                    $this->info('ETA: Test Created Successfully for ' . $testType . '!');
                }
            }
            $this->Filesystem->put($path, $stub);
            $this->info('ETA:  Tests Created Success Fully! ');

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
