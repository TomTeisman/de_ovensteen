<?php

namespace App\Interfaces;

interface Controller
{
    /**
     * Get all items from the resource
     */
    public static function index();

    /**
     * Show the specified resource
     */
    public static function show($id);
    
    /**
     * Show the form for creating a new resource
     */
    public static function create();

    /**
     * Store a newly created resource
     */
    public static function store();

    /**
     * Show the form for editing the specified resource
     */
    public static function edit($id);

    /**
     * Update the specified resource in storage
     */
    public static function update($id);

    /**
     * Remove the specified resource from storage
     */
    public static function destroy($id);
}