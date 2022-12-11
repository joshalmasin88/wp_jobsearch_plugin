<div class="container">
                <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <input type="text" class="keywords form-control" name="keywords" placeholder="Job Keywords">
                            </div>
                            <div class="form-group">
                                <input type="text" class="location form-control"  name="location" placeholder="Location">
                            </div>
                        <button class="search btn btn-primary" >Search</button>
                    </div>
                </div>
            </div>
                    <div class="jobs"></div>
                <script>
                    jQuery(document).ready(function($) {
                        jQuery( ".search" ).click(function() {
                            jQuery(".jobs").html("")
                            jQuery.ajax({
                            url: "<?php echo admin_url('admin-ajax.php'); ?>", // Since WP 2.8 ajaxurl is always defined and points to admin-ajax.php
                            type: "POST",
                            dataType : "json",
                            data: {
                                'action':'joobleSearch', // This is our PHP function below
                                'keywords' : jQuery('.keywords').val(), // This is the variable we are sending via AJAX
                                'location' : jQuery('.location').val(),
                            },
                            success:function(data) {
                        // This outputs the result of the ajax request (The Callback)
                                for (x in data.jobs) {
                                    jQuery(".jobs").append(`
                                    <div class="card text-center mb-5">
                                        <div class="card-body">
                                            <h5 class="card-title">${data.jobs[x].title} - ${data.jobs[x].location}</h5>
                                            <p class="card-text">${data.jobs[x].snippet}</p>
                                            <a href="${data.jobs[x].link}" class="btn btn-primary">Apply</a>
                                        </div>
                                        </div>
                                    `)
                                }
                                console.log(data)
                            },
                            error: function(errorThrown){
                                window.alert(errorThrown);
                            }
                        });
                        });
                    });
                </script>