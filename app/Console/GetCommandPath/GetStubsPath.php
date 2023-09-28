<?php

namespace App\Console\GetCommandPath;

enum GetStubsPath: string
{
    public const ANGULAR_COMPONENT_STUB = "storage/ModuleStubsComponent/Angular.component.stub";
    public const REACT_COMPONENT_STUB = "storage/ModuleStubsComponent/React.component.stub";
    public const VUE_COMPONENT_STUB = "storage/ModuleStubsComponent/Vue.component.stub";
    public const STORE_REQUEST_COMPONENT_STUB = "storage/ModuleStubsComponent/StoreRequest.stub";
    public const UPDATE_REQUEST_COMPONENT_STUB = "storage/ModuleStubsComponent/UpdateRequest.stub";
    public const CONTROLLER_COMPONENT_STUB = "storage/ModuleStubsComponent/Controller.stub";
    public const MODEL_COMPONENT_STUB = "storage/ModuleStubsComponent/Model.stub";
    public const JOBS_COMPONENT_STUB = "storage/ModuleStubsComponent/Jobs.stub";
    public const LISTENER_COMPONENT_STUB = "storage/ModuleStubsComponent/Listener.stub";
    public const EVENT_COMPONENT_STUB = "storage/ModuleStubsComponent/Event.stub";
    public const SERVICE_COMPONENT_STUB = "storage/ModuleStubsComponent/Service.stub";
    public const REPOSITORY_COMPONENT_STUB = "storage/ModuleStubsComponent/Repository.stub";
    public const RESOURCE_COMPONENT_STUB = "storage/ModuleStubsComponent/Resource.stub";
    public const TEST_COMPONENT_STUB = "storage/ModuleStubsComponent/Test.stub";
}
