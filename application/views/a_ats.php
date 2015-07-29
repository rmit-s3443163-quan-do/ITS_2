<?php
/**
 * Created by PhpStorm.
 * User: JayDz
 * Date: 23/07/15
 * Time: 5:40 PM
 */
?>

    <div class="admin-main">
        <div class="row">
            <div class="col-xs-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Software Engineering
                        <div class="pull-right small-sub">
                                    <span class="glyphicon glyphicon-edit"
                                          data-toggle="tooltip" data-placement="right"
                                          title="Edit"></span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>This course is designed to impart knowledge and skills necessary to analyse, design
                            and implement complex software engineering projects.</p>
                        <hr>
                        <h4>Offerings</h4>
                        <ul>
                            <li>Sem 1, 2015</li>
                            <li>Sem 2, 2015 <span class="badge pull-right">cur</span></li>
                        </ul>
                        <hr>
                        <h4>Topic List</h4>
                        <ul>
                            <li>Week 1</li>
                            <li>Week 2</li>
                            <li>Week 3</li>
                            <li>Week 4</li>
                            <li>Week 5</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Web Programming
                        <div class="pull-right small-sub">
                                    <span class="glyphicon glyphicon-edit"
                                          data-toggle="tooltip" data-placement="right"
                                          title="Edit"></span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>The course introduces you to the basic concepts of the World Wide Web (Web),
                            and the principles and tools that are used to develop Web applications.</p>
                        <hr>
                        <h5>No Offering for this course yet</h5>
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span> &nbsp;Add Offering
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-3">
                <div class="panel panel-info">
                    <div class="panel-heading">Database Concepts
                        <div class="pull-right small-sub">
                                    <span class="glyphicon glyphicon-edit"
                                          data-toggle="tooltip" data-placement="right"
                                          title="Edit"></span>
                        </div>
                    </div>
                    <div class="panel-body">
                        <p>Databases and database technology are having a major impact on the growing use of
                            computers.
                            They play a critical role in almost all areas where computers are used.</p>
                        <hr>
                        <h4>Offerings</h4>
                        <ul>
                            <li>
                                <div id="offer"><a href="#">Sem 2, 2015 (current)</a></div>
                                <div id="offer-input" class="hidden">
                                    <input type="text" value="Sem 2, 2015 (current)"/>

                                    <button type="button" class="btn btn-default">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </button>
                                    <button type="button" class="btn btn-primary">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                </div>
                            </li>
                        </ul>
                        <hr>
                        <h5>No Topic for this offering yet</h5>
                        <button type="button" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus"></span> &nbsp;Add Topic
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 hidden" id="add-form">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <input id="course-title" class="title-input form-control" placeholder="course title"/>
                    </div>
                    <div class="panel-body">
                        <textarea class="form-control" rows="3" placeholder="course description"></textarea>
                        <hr>
                        <button class="btn btn-default btn-small add-done" type="button">Cancel</button>
                        <button type="button" class="btn btn-primary add-done">
                            <span class="glyphicon glyphicon-ok"></span> &nbsp;Save
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-xs-3" id="add-button">
                <div class="panel panel-add">
                    <div class="panel-body text-center">
                        <h1><span class="glyphicon glyphicon-plus"></span></h1>
                        <h5>New Course</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
    $('#offer-input button').click(function () {
        $('#offer-input').addClass('hidden');
        $('#offer').removeClass('hidden');
    });

    $('#offer').click(function () {
        $(this).addClass('hidden');
        $('#offer-input').removeClass('hidden');
    });

    $('#add-button').click(function () {
        $(this).addClass('hidden');
        $('#add-form').removeClass('hidden');
        $('#course-title').focus();
    });

    $('.add-done').click(function () {
        $('#add-form').addClass('hidden');
        $('#add-button').removeClass('hidden');
    });

</script>
