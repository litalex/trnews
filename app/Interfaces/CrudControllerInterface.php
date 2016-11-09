<?php

namespace Litalex\Interfaces;

use Symfony\Component\HttpFoundation\Request;

/**
 * Interface ControllerInterface
 *
 * @package Litalex\Interfaces
 */
interface CrudControllerInterface
{
    /**
     * List
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function index(Request $request);

    /**
     * View
     *
     * @param string $lug
     *
     * @return mixed
     */
    public function view($lug);

    /**
     * Create&Update
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function store(Request $request);

    /**
     * Delete
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function destroy(Request $request);
}