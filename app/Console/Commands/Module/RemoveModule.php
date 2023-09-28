<?php

namespace App\Console\Commands\Module;

use App\Console\CommandTemplates\RemoveModuleTemplate;
use App\Console\GetCommandPath\GetModulePath;
use App\Traits\CommandHelpers;
use Exception;
use Illuminate\Console\Command as CommandAlias;

class RemoveModule extends removeModuleTemplate
{
    use CommandHelpers;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:remove {name}

                                          {--all}
                                          {--angular}
                                          {--react}
                                          {--vue}
                                          {--storerequest}
                                          {--updaterequest}
                                          {--controller}
                                          {--model}
                                          {--resource}
                                          {--event}
                                          {--jobs}
                                          {--listener}
                                          {--service}
                                          {--repository}
                                          {--resource}
                                          {--seeder}
                                          {--factory}
                                          {--test}
                                          {--uninstall}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'KILO:  Module has Removing or Deleting Success Fully!';

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
            $this->input->setOption('resource', true);
            $this->input->setOption('event', true);
            $this->input->setOption('jobs', true);
            $this->input->setOption('listener', true);
            $this->input->setOption('service', true);
            $this->input->setOption('repository', true);
            $this->input->setOption('resource', true);
            $this->input->setOption('seeder', true);
            $this->input->setOption('factory', true);
            $this->input->setOption('test', true);
            $this->input->setOption('uninstall', true);
        }

        if ($this->option('angular'))
        {
            $this->removeAngularComponent();
        }

        if ($this->option('react'))
        {
            $this->removeReactComponent();
        }

        if ($this->option('vue'))
        {
            $this->removeVueComponent();
        }

        if ($this->option('storerequest'))
        {
            $this->removeStoreRequestComponent();
        }

        if ($this->option('updaterequest'))
        {
            $this->removeUpdateRequestComponent();
        }

        if ($this->option('controller'))
        {
            $this->removeControllerComponent();
        }

        if ($this->option('model'))
        {
            $this->removeModelComponent();
        }

        if ($this->option('resource'))
        {
            $this->removeResourceComponent();
        }

        if ($this->option('event'))
        {
            $this->removeEventComponent();
        }

        if ($this->option('jobs'))
        {
            $this->removeJobsComponent();
        }

        if ($this->option('listener'))
        {
            $this->removeListenerComponent();
        }

        if ($this->option('service'))
        {
            $this->removeServiceComponent();
        }

        if ($this->option('repository'))
        {
            $this->removeRepositoryComponent();
        }

        if ($this->option('resource'))
        {
            $this->removeResourceComponent();
        }

        if ($this->option('seeder'))
        {
            $this->removeSeederComponent();
        }

        if ($this->option('factory'))
        {
            $this->removeFactoryComponent();
        }

        if ($this->option('test'))
        {
            $this->removeTestComponent();
        }

        if ($this->option('uninstall'))
        {
            $this->Uninstall();
        }

        return CommandAlias::SUCCESS;
    }

    /**
     * @return void
     */
    protected function removeAngularComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getAngularPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }
            $this->info("KILO:  Angular{$CommandName} has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    /**
     * @return void
     */
    protected function removeReactComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getReactPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }
            $this->info("KILO:  React{$CommandName} has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeVueComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getVuePath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }
            $this->info("KILO:  Vue{$CommandName} has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeStoreRequestComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getStoreRequestPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Request");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  Store{$CommandName}Request has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeUpdateRequestComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getUpdateRequestPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Request");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  Update{$CommandName}Request has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeControllerComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getControllerPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Controller");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  {$CommandName}Controller has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeModelComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getModelPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Model");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  {$CommandName} has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeEventComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getEventPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Event");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  {$CommandName}Event has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeJobsComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getJobsPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Jobs");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  {$CommandName}Job has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeListenerComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getListenerPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Listener");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  {$CommandName}Listener has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeServiceComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getServicePath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Service");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO:  {$CommandName}Service has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeRepositoryComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getRepositoryPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Repository");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }

            $this->info("KILO:  {$CommandName}Repository has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeResourceComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = GetModulePath::getResourcesPath($CommandName);

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Resources");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }

            $this->info("KILO:  {$CommandName}Resource has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }


    }

    /**
     * @return void
     */
    protected function removeSeederComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = base_path("database/seeders/{$CommandName}Seeder.php");

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }

            $this->info("KILO:  {$CommandName}Seeder has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeFactoryComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $path = base_path("database/factories/{$CommandName}Factory.php");

            if ($this->alreadyExists($path))
            {
                unlink($path);
            }
            $this->info("KILO:  {$CommandName}Factory has Removing or Deleted Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function removeTestComponent(): void
    {
        try {

            $CommandName = $this->argument('name');
            $testTypes = ['Index', 'Store', 'Show', 'Update', 'Delete'];

            foreach ($testTypes as $testType) {
                $path = base_path("app/Modules/{$CommandName}/Test/get{$testType}RequestTest.php");

                if ($this->alreadyExists($path))
                {
                    unlink($path);
                }
            }

            $dirPath = base_path("app/Modules/{$CommandName}/Test");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }

            $this->info("KILO: Test components have been removed and deleted successfully!");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }

    /**
     * @return void
     */
    protected function Uninstall(): void
    {
        try {

            $CommandName = $this->argument('name');
            $dirPath = base_path("app/Models/{$CommandName}");

            if (is_dir($dirPath) && scandir($dirPath))
            {
                rmdir($dirPath);
            }
            $this->info("KILO: $CommandName Module Removing or Deleting Success Fully! ");

        } catch (Exception $e) {
            $this->error($e->getMessage());
        }

    }
}
