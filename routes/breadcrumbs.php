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

//Division
Breadcrumbs::register('division', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Daftar Division', route('division.index'));
});

Breadcrumbs::register('division.create', function($breadcrumbs)
{
    $breadcrumbs->parent('division');
    $breadcrumbs->push('+ Create Division', route('division.create'));
});

Breadcrumbs::register('division.edit', function($breadcrumbs, $division)
{
    $breadcrumbs->parent('division');
    $breadcrumbs->push($division->name, route('division.edit', $division->id));
});

Breadcrumbs::register('division.show', function($breadcrumbs, $division)
{
    $breadcrumbs->parent('division');
    $breadcrumbs->push($division->name, route('division.show', $division->id));
});

//Rank Salary
Breadcrumbs::register('rank_salary', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Daftar Rank Salary', route('rank_salary.index'));
});

Breadcrumbs::register('rank_salary.create', function($breadcrumbs)
{
    $breadcrumbs->parent('rank_salary');
    $breadcrumbs->push('+ Create Rank Salary', route('rank_salary.create'));
});

Breadcrumbs::register('rank_salary.edit', function($breadcrumbs, $rank_salary)
{
    $breadcrumbs->parent('rank_salary');
    $breadcrumbs->push($rank_salary->rank, route('rank_salary.edit', $rank_salary->id));
});

Breadcrumbs::register('rank_salary.show', function($breadcrumbs, $rank_salary)
{
    $breadcrumbs->parent('rank_salary');
    $breadcrumbs->push($rank_salary->rank, route('rank_salary.show', $rank_salary->id));
});

//Criteria
Breadcrumbs::register('criteria', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Daftar Criteria', route('criteria.index'));
});

Breadcrumbs::register('criteria.create', function($breadcrumbs)
{
    $breadcrumbs->parent('criteria');
    $breadcrumbs->push('+ Create Criteria', route('criteria.create'));
});

Breadcrumbs::register('criteria.edit', function($breadcrumbs, $criteria)
{
    $breadcrumbs->parent('criteria');
    $breadcrumbs->push($criteria->criteria, route('criteria.edit', $criteria->id));
});

Breadcrumbs::register('criteria.show', function($breadcrumbs, $criteria)
{
    $breadcrumbs->parent('criteria');
    $breadcrumbs->push($criteria->criteria, route('criteria.show', $criteria->id));
});

//Criteria Comparison
Breadcrumbs::register('criteria_comparison', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Daftar Criteria Comparison', route('criteria_comparison.index'));
});

Breadcrumbs::register('criteria_comparison.create', function($breadcrumbs)
{
    $breadcrumbs->parent('criteria_comparison');
    $breadcrumbs->push('+ Create Criteria Comparison', route('criteria_comparison.create'));
});

Breadcrumbs::register('criteria_comparison.edit', function($breadcrumbs, $criteria_comparison)
{
    $breadcrumbs->parent('criteria_comparison');
    $breadcrumbs->push($criteria_comparison->id, route('criteria_comparison.edit', $criteria_comparison->id));
});

Breadcrumbs::register('criteria_comparison.show', function($breadcrumbs, $criteria_comparison)
{
    $breadcrumbs->parent('criteria_comparison');
    $breadcrumbs->push($criteria_comparison->id, route('criteria_comparison.show', $criteria_comparison->id));
});
