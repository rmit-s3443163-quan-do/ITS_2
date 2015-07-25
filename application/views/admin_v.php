<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 24/07/15
 * Time: 5:43 PM
 */
?>
Hello <?= $uname ?>, this is Admin CP page<br/>

<a href="<?= base_url(); ?>home">Homepage</a><br/>
<a href="<?= base_url(); ?>admin/doLogout">Logout</a><br/>

<ul>
    <li><a href="<?= base_url(); ?>admin/ats">ATS</a></li>
    <li><a href="<?= base_url(); ?>admin/course">Course</a></li>
    <li><a href="<?= base_url(); ?>admin/question">Question</a></li>
</ul>

<h1>Course List</h1>
<ul>
<?php foreach ($course_arr as $index=>$value): ?>

    <li>
        <?= $index+1; ?>. <?= $value->text; ?>
        [<a href="<?= base_url(); ?>course/del/<?= $value->id ?>">Delete</a>]
    </li>

<?php endforeach; ?>
</ul>

<h1>Add Course</h1>
<form action="<?= base_url(); ?>course/add" method="post">
<input type="text" name="text" placeholder="course name"/>
<button type="submit">Submit</button>
</form>

