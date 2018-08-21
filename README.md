# php-study

Simple Repository that helps me better understand coding funcdamentals in PHP/Vanilla. E.g Inheritence, Polymorphism etc.

# inheritence

this directory demonstrates a simple inheritence of for example, formOne class from the Student class.


# import-class

this directory contains a mini-project that basically stores Student information using Mysql.
the class in classes/d-base/mysql.php handles mysql queries.
this class is imported by respective files, for example index.php, which has the UI for student registration.

## header.php

    contains header tags and initial imports.

## footer.php

    contains footer tags and footer imports.

## index.php

    is the first page that renders the UI for student registration.

## students.php

    displays a list of all registered students.
    executes the fetch_students method in the __ Mysql __ class.

## edit.php

    fetches the student details using their IDs and renders them to the edit form.
    utilizes get_student method in the __ Mysql __ class.

        The edit button triggers the update method in the Mysql class, that fetches the $_POST array and makes respective updates on the    
        fields.
        Indexing is by ID.



# MYSQL FUNCTIONS.

## These are the methods in the Mysql class.

### insert

    $mysql->insert("students",$_POST);

    where $_POST is the $_POST array and "students" is the table you're fetching from.

### fetch

    $mysql->fetch("students");

    where "students" is the table your are fetching from.

### get

    $mysql->get("students","id", $id);

    gets the records of a specific entity,
    for example this method fetched the student's details based on his/her id.
    where "students" is the table your are fetching from.
    id is the field you want to query
    $id is the value you want to query in that field.

##update

    $mysql->update("students", $_POST);
    
    this method updates the students details with the values in the post array.
    is included in the post array.
