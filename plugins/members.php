<?php

/*
 * Example PHP implementation used for the index.html example
 */

// DataTables PHP library
include("../php/DataTables.php");

// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;


/*
 * Example PHP implementation used for the join.html example
 */
Editor::inst($db, 'person')
    ->field(
        Field::inst('member.phone'),
        Field::inst('member.memberNr'),
        Field::inst('person.email')
            ->validator(Validate::email(ValidateOptions::inst()
                ->message('Please enter an e-mail address')
            )),
        Field::inst('person.firstname'),
        Field::inst('person.lastname'),
        Field::inst('member.birthdate')
            ->validator(Validate::dateFormat('Y-m-d'))
            ->getFormatter(Format::dateSqlToFormat('Y-m-d'))
            ->setFormatter(Format::dateFormatToSql('Y-m-d'))

    )
    ->leftJoin('member', 'person.id', '=', 'member.fk_person')
    ->process($_POST)
    ->json();
