<?php

namespace App\Console\CommandTemplates;

use Illuminate\Console\Command;

abstract class RemoveModuleTemplate extends Command
{
    /**
     * @return void
     */
    abstract protected function removeAngularComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeReactComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeVueComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeStoreRequestComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeUpdateRequestComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeControllerComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeModelComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeEventComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeJobsComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeListenerComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeServiceComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeRepositoryComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeResourceComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeSeederComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeFactoryComponent(): void;

    /**
     * @return void
     */
    abstract protected function removeTestComponent(): void;

    /**
     * @return void
     */
    abstract protected function Uninstall(): void;
}
