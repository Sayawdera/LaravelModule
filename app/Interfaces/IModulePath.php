<?php

namespace App\Interfaces;

interface IModulePath
{
    /**
     * @param $AngularArgument
     * @return mixed
     */
    public static function getAngularPath($AngularArgument): mixed;

    /**
     * @param $ReactArgument
     * @return mixed
     */
    public static function getReactPath($ReactArgument): mixed;

    /**
     * @param $VueArgument
     * @return mixed
     */
    public static function getVuePath($VueArgument): mixed;

    /**
     * @param $StoreRequestArgument
     * @return mixed
     */
    public static function getStoreRequestPath($StoreRequestArgument): mixed;

    /**
     * @param $UpdateRequestArgument
     * @return mixed
     */
    public static function getUpdateRequestPath($UpdateRequestArgument): mixed;

    /**
     * @param $ControllerArgument
     * @return mixed
     */
    public static function getControllerPath($ControllerArgument): mixed;

    /**
     * @param $ModelArgument
     * @return mixed
     */
    public static function getModelPath($ModelArgument): mixed;

    /**
     * @param $ServiceArgument
     * @return mixed
     */
    public static function getServicePath($ServiceArgument): mixed;

    /**
     * @param $RepositoryArgument
     * @return mixed
     */
    public static function getRepositoryPath($RepositoryArgument): mixed;

    /**
     * @param $TestArgument
     * @param $TestTypes
     * @param $Methods
     * @return mixed
     */
    public static function getTestPath($TestArgument, $TestTypes, $Methods): mixed;

    /**
     * @param $ResourcesArgument
     * @return mixed
     */
    public static function getResourcesPath($ResourcesArgument): mixed;

    /**
     * @param $EventArgument
     * @return mixed
     */
    public static function getEventPath($EventArgument): mixed;

    /**
     * @param $JobsArgument
     * @return mixed
     */
    public static function getJobsPath($JobsArgument): mixed;

    /**
     * @param $ListenerArgument
     * @return mixed
     */
    public static function getListenerPath($ListenerArgument): mixed;
}
