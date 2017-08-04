<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

Breadcrumbs::register('assessment', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Assessment', route('year.index'));
});

Breadcrumbs::register('assessment.create', function($breadcrumbs)
{
    $breadcrumbs->parent('assessment');
    $breadcrumbs->push('+ Create Assessment', route('year.create'));
});

// Alternative
Breadcrumbs::register('alternative', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Daftar Karyawan', route('alternative.index'));
});

Breadcrumbs::register('alternative.create', function($breadcrumbs)
{
    $breadcrumbs->parent('alternative');
    $breadcrumbs->push('+ Create Alternative', route('alternative.create'));
});

Breadcrumbs::register('alternative.edit', function($breadcrumbs, $alternative)
{
    $breadcrumbs->parent('alternative');
    $breadcrumbs->push($alternative->alternative, route('alternative.edit', $alternative->id));
});

Breadcrumbs::register('alternative.show', function($breadcrumbs, $alternative)
{
    $breadcrumbs->parent('alternative');
    $breadcrumbs->push($alternative->alternative, route('alternative.show', $alternative->id));
});
