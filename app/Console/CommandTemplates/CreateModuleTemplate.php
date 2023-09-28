<?php

namespace App\Console\CommandTemplates;

use Illuminate\Console\Command;

abstract class CreateModuleTemplate extends Command
{
    /**
     * @return void
     */
    abstract protected function createAngularComponent(): void;

    /**
     * @return void
     */
    abstract protected function createReactComponent(): void;

    /**
     * @return void
     */
    abstract protected function createVueComponent(): void;

    /**
     * @return void
     */
    abstract protected function createStoreRequestComponent(): void;

    /**
     * @return void
     */
    abstract protected function createUpdateRequestComponent(): void;

    /**
     * @return void
     */
    abstract protected function createControllerComponent(): void;

    /**
     * @return void
     */
    abstract protected function createModelComponent(): void;

    /**
     * @return void
     */
    abstract protected function createServiceComponent(): void;

    /**
     * @return void
     */
    abstract protected function createRepositoryComponent(): void;

    /**
     * @return void
     */
    abstract protected function createResourceComponent(): void;

    /**
     * @return void
     */
    abstract protected function createEventComponent(): void;

    /**
     * @return void
     */
    abstract protected function createJobsComponent(): void;

    /**
     * @return void
     */
    abstract protected function createListenerComponent(): void;

    /**
     * @return void
     */
    abstract protected function createMigrationComponent(): void;

    /**
     * @return void
     */
    abstract protected function createFactoryComponent(): void;

    /**
     * @return void
     */
    abstract protected function createSeederComponent(): void;

    /**
     * @return void
     */
    abstract protected function createTestComponent(): void;
}
