<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
function btn_edit($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<i class="fa fa-pencil-square-o"></i>', array('class' => "btn btn-primary btn-xs", 'title'=>'Edit', 'data-toggle'=>'tooltip', 'data-placement'=>'top'));
}
function btn_edit_disable($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span class="glyphicon glyphicon-pencil"></span>', array('class' => "btn btn-primary btn-xs disabled", 'title'=>'Edit', 'data-toggle'=>'tooltip', 'data-placement'=>'top'));
}

function btn_edit_modal($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span class="glyphicon glyphicon-pencil"></span>', array('class' => "btn btn-primary btn-xs", 'title'=>'Edit', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-toggle'=>'modal', 'data-target'=>'#myModal'));
}
function btn_banned_modal($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span class="fa fa-close"></span>', array('class' => "btn btn-danger btn-xs", 'title'=>'Edit', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'data-toggle'=>'modal', 'data-target'=>'#myModal'));
}

function btn_delete($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<i class="fa fa-trash-o"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title'=>'Delete', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('".lang('delete_alert')."');"
    ));    
}
function btn_delete_disable($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<i class="fa fa-trash-o"></i>', array(
        'class' => "btn btn-danger btn-xs disabled", 'title'=>'Delete', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
    ));    
}
function btn_active($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title'=>'Active', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('You are about to active new sesion . This cannot be undone. Are you sure?');"
    ));    
}

function btn_print() {
    return anchor('','<span class="glyphicon glyphicon-print"></i></span>', array('class' => "btn btn-primary btn-xs", 'title'=>'Print','data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick'=>'printDiv("printableArea")'));
}

function btn_atndc_print() {
    return anchor('','<span class="glyphicon glyphicon-print"></i></span>', array('class' => "btn btn-customs btn-xs", 'title'=>'Print','data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick'=>'printDiv("printableArea")'));
}

function btn_pdf($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span <i class="fa fa-file-pdf-o"></i></span>', array('class' => "btn btn-primary btn-xs",'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'PDF'));
}
function btn_make_pdf($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span <i class="fa fa-file-pdf-o""></i></span>', array('class' => "btn btn-primary btn-xs",'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Generate&nbsp;PDF'));
}
function btn_excel($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span <i class="fa fa-file-excel-o"></i></span>', array('class' => "btn btn-primary btn-xs",'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'Excel'));
}

function btn_view($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span class="fa fa-list-alt"></span>', array('class' => "btn btn-info btn-xs",'data-toggle'=>'tooltip', 'data-placement'=>'top', 'title'=>'View'));
}

function btn_save($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span <i class="fa fa-plus-circle"></i></span>', array('class' => "btn btn-success btn-xs", 'title'=>'Save', 'data-toggle'=>'tooltip', 'data-placement'=>'top'));
}

function btn_add($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<span <i class="fa fa-plus-square"></i></span>', array('class' => "btn btn-success btn-xs", 'title'=>'Add Routine', 'data-toggle'=>'tooltip', 'data-placement'=>'top'));
}

function btn_publish($Vg1ljtjm4gmp) {
return anchor($Vg1ljtjm4gmp, '<i class="fa fa-times"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title'=>'Click to Unpublish', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('You are about to unpublish this data. Are you sure?');"
    ));    
}

function btn_unpublish($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title'=>'Click to Publish', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('You are about to publish this data. Are you sure?');"
    ));
}
function btn_approve($Vg1ljtjm4gmp) {
return anchor($Vg1ljtjm4gmp, '<i class="fa fa-times"></i>', array(
        'class' => "btn btn-danger btn-xs", 'title'=>'Click to Reject', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('You are about to unpublish this data. Are you sure?');"
    ));    
}

function btn_reject($Vg1ljtjm4gmp) {
    return anchor($Vg1ljtjm4gmp, '<i class="fa fa-check"></i>', array(
        'class' => "btn btn-success btn-xs", 'title'=>'Click to Approve', 'data-toggle'=>'tooltip', 'data-placement'=>'top', 'onclick' => "return confirm('You are about to publish this data. Are you sure?');"
    ));
}
