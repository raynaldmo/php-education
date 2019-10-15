<?php
$timestamp = strtotime('7/4/2015');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('7-4-2015');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('7.4.2015');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('2015-07-04');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('last day of February 2015');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('last day of February 2016');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('next Wednesday');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('Wednesday next week');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('+3 weeks');
echo date('F j, Y', $timestamp) . '<br>';

$timestamp = strtotime('+3 weeks', strtotime('12/25/2015'));
echo date('F j, Y', $timestamp) . '<br>';


$timestamp = strtotime('now');
echo $timestamp . '<br>';
echo date('F j, Y:G:i:s', $timestamp) . '<br>';
