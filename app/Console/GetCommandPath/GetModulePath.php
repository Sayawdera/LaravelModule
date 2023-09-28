<?php

namespace App\Console\GetCommandPath;

use App\Interfaces\IModulePath;
use Illuminate\Support\Str;

class GetModulePath implements IModulePath
{
    /**
     * @param $AngularArgument
     * @return string
     */
    public static function getAngularPath($AngularArgument): string
    {
        $AngularComponent = Str::studly(class_basename($AngularArgument));
        return base_path('resources/Components/Angular/' . str_replace('\\', '/', $AngularComponent) . ".ts");
    }

    /**
     * @param $ReactArgument
     * @return string
     */
    public static function getReactPath($ReactArgument): string
    {
        $ReactComponent = Str::studly(class_basename($ReactArgument));
        return base_path('resources/Components/React/' . str_replace('\\', '/', $ReactComponent) . ".jsx");
    }

    /**
     * @param $VueArgument
     * @return string
     */
    public static function getVuePath($VueArgument): string
    {
        $VueComponent = Str::studly(class_basename($VueArgument));
        return base_path('resources/Components/Vue/' . str_replace('\\', '/', $VueComponent) . ".vue");
    }

    /**
     * @param $StoreRequestArgument
     * @return string
     */
    public static function getStoreRequestPath($StoreRequestArgument): string
    {
        $StoreRequestComponent = Str::studly(class_basename($StoreRequestArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $StoreRequestComponent) . "/Request/" . "Store{$StoreRequestComponent}Request.php");
    }

    /**
     * @param $UpdateRequestArgument
     * @return string
     */
    public static function getUpdateRequestPath($UpdateRequestArgument): string
    {
        $UpdateRequestComponent = Str::studly(class_basename($UpdateRequestArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $UpdateRequestComponent) . "/Request/" . "Update{$UpdateRequestComponent}Request.php");
    }

    /**
     * @param $ControllerArgument
     * @return string
     */
    public static function getControllerPath($ControllerArgument): string
    {
        $ControllerComponent = Str::studly(class_basename($ControllerArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $ControllerComponent) . "/Controller/" . "{$ControllerComponent}Controller.php");
    }

    /**
     * @param $ModelArgument
     * @return string
     */
    public static function getModelPath($ModelArgument): string
    {
        $ModelComponent = Str::studly(class_basename($ModelArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $ModelComponent) . "/Model/" . "{$ModelComponent}.php");
    }

    /**
     * @param $ServiceArgument
     * @return string
     */
    public static function getServicePath($ServiceArgument): string
    {
        $ServiceComponent = Str::studly(class_basename($ServiceArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $ServiceComponent) . "/Service/" . "{$ServiceComponent}Service.php");
    }

    /**
     * @param $RepositoryArgument
     * @return string
     */
    public static function getRepositoryPath($RepositoryArgument): string
    {
        $RepositoryComponent = Str::studly(class_basename($RepositoryArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $RepositoryComponent) . "/Repository/" . "{$RepositoryComponent}Repository.php");
    }

    /**
     * @param $TestArgument
     * @param $TestTypes
     * @param $Methods
     * @return string
     */
    public static function getTestPath($TestArgument, $TestTypes, $Methods): string
    {
        $testComponent = Str::studly(class_basename($TestArgument));
        return base_path("app/Modules/{$testComponent}/Test/get{$TestTypes}RequestTest.php");
    }

    /**
     * @param $ResourcesArgument
     * @return string
     */
    public static function getResourcesPath($ResourcesArgument): string
    {
        $resourcesComponent = Str::studly(class_basename($ResourcesArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $resourcesComponent) . "/Resources/" . "{$resourcesComponent}Resource.php");
    }

    /**
     * @param $EventArgument
     * @return string
     */
    public static function getEventPath($EventArgument): string
    {
        $EventComponent = Str::studly(class_basename($EventArgument));
        return base_path('app/Modules/' . str_replace('\\' , '/', $EventComponent) . "/Event/" . "{$EventComponent}Event.php");
    }

    /**
     * @param $JobsArgument
     * @return string
     */
    public static function getJobsPath($JobsArgument): string
    {
        $JobsComponent = Str::studly(class_basename($JobsArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $JobsComponent) . "/Jobs/" . "{$JobsComponent}Job.php");
    }

    /**
     * @param $ListenerArgument
     * @return string
     */
    public static function getListenerPath($ListenerArgument): string
    {
        $ListenerComponent = Str::studly(class_basename($ListenerArgument));
        return base_path('app/Modules/' . str_replace('\\', '/', $ListenerComponent) . "/Listener/" . "{$ListenerComponent}Listener.php");
    }
}
