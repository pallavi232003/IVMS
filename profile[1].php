<?php
include('backend/test.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VolunteerProfile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: rgb(235, 237, 238);
            font-family: Arial, sans-serif;
        }
        
        #sidebar {
            position: fixed;
            width: 60px;
            height: 100%;
            background-color: #fffefe;
            padding-top: 50px;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-bottom: 40px;
        }
        /*#sidebar a:hover {
            width: 10px;
            height: 15px;
        }*/
        
        #sidebar a {
            text-decoration: none;
            color: #fff;
            margin-bottom: 40px;
            justify-content: space-between;
            cursor: pointer;
        }
        
        #sidebar a:hover {
            background-color: #e9e3e3;
            text-decoration: underline;
            text-decoration-color: #000000;
        }
        
        #sidebar a.active {
            text-decoration: underline;
            text-decoration-color: #000000;
        }
        
        img {
            height: 25px;
            width: 28px;
        }
        
        #content {
            margin-left: 60px;
            /* Adjust according to sidebar width */
            padding: 20px;
        }
        
        #content h1 {
            text-align: center;
            font-weight: bold;
            margin-top: 25px;
            /*creating space on top of container for any requirements needed*/
        }
        
        .container11 {
            width: 49%;
            float: left;
        }
        
        .container12 {
            width: 49%;
            float: right;
        }
        
        .lrow {
            text-align: left;
        }
        
        .content1 {
            display: flex;
            margin-top: 50px;            
        }
        
        .container {
            background-color: white;
            width: 700px;
            padding: 20px;
            overflow-x: auto;
            max-height: 500px;
            max-width: 1400px;
            overflow-y: auto;
            border-radius: 3px;
            display: flex;
            justify-content: space-between;
        }
        
        .container1,
        .container2 {
            width: 48%;
            /* Adjust width as needed */
        }
        
        .lrow {
            text-align: right;
        }
        
        .button {
            background-color: #13960c;
            border: none;
            border-radius: 4px;
            color: white;
            padding: 3px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            /* margin-bottom: 15px; */
            margin-top: 0px;
            cursor: pointer;
        }
        
        .content_tasks {
            background-color: white;
            height: 180px;
            width: 1050px;
        }
        
        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        
        button {
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: white;
        }
        
        .all-tasks {
            background-color: blue;
            color: white;
        }
        
        .ongoing-tasks {
            background-color: orange;
            color: white;
        }
        
        .completed-tasks {
            background-color: green;
            color: white;
        }
        
        #photo-container {
            width: 300px;
            height: 300px;
            /* Adjust container size as needed */
            border: 2px dashed #ccc;
            /*margin-left: 1100px;*/
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }
        
        #photo-preview {
            max-width: 100%;
            max-height: 100%;
            /* Adjust the size of the photo within the container */
            width: auto;
            height: auto;
        }
        
        .volunteer_photo {
            height: fit-content;
            width: fit-content;
            padding-top: 80px;
            margin: 30px;
        }
        
        .content1 {
            flex-direction: row;
        }
        th {
            margin:20px;
            padding:5px;
        }

        .name-container, h1,h3{
           width: fit-content;
           text-align: left;
           margin: 0;
            
        }

        .outer-container{
            display: grid;
            /* margin-right: 0; */

        }   
       
      
    </style>
</head>

<body>

    <div id="sidebar">
        <a href="http://127.0.0.1:5500/Home_page.html" title="Home"><img src="https://www.freeiconspng.com/uploads/home-house-silhouette-icon-building--public-domain-pictures--20.png"></a>
        <!--<a href="http://127.0.0.1:5500/profiles.html" title="Volunteer Profile"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>-->
        <a href="http://127.0.0.1:5500/masterpage.html" title="Master page"><img src=https://cdn4.iconfinder.com/data/icons/project-management-72/70/group__team__management__employees_-512.png></a>
        <a href="http://127.0.0.1:5500/Admin_page.html#" title=" DeputyAdmin_page"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjoxxJYsY_IZZcGn3MLq8ayWfk9YGzxRZ-3emZLUpVJQ6cFkfR_VRDBFc05tdBS7IqOcs&usqp=CAU" style="height: 28px; width:28px"></a>
        <a href="http://127.0.0.1:5500/sign_in.html" title="Logout"><img src=https://www.dlf.pt/dfpng/middlepng/356-3564451_a-shutdown-restart-icons-transparent-background-logout-icon.png></a>

    </div>

    <div id="content">
        <div class="content1">

        <?php
            if ($personalDetails->num_rows > 0) $personal = $personalDetails->fetch_assoc();
            if ($eduDetails->num_rows > 0) $edu = $eduDetails->fetch_assoc();

        ?>

        <div class="outer-container container1 container">
            <div class="name-container">
                <h1><?php echo $personal['name']?></h1>
                <h2 style="font-weight:100; margin-top:0">NIN - 0000</h2>
            </div>
            <div class="container">
                    <div class="container1">
                    <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Status:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <a href="#" class="button">Active</a>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Name:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['name']?></label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Email Address:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['email']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Country code:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['country_code']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Phone number:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['phone_number']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Country:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['country']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>City:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['city']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Source of joining:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $personal['source_of_joining']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>

                    <div class="container2">
                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>College/University:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $edu['college']?></label>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Course:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $edu['course']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>Facebook link:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $edu['facebook']?></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>

                        <div class="row">
                            <div class="container11">
                                <div class="lrow">
                                    <label><strong>linkedin link:</strong></label>
                                </div>
                            </div>
                            <div class="container12">
                                <div class="rrow">
                                    <label><?php echo $edu['linkedin']?></label>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                

        </div>
                
            <div class="volunteer_photo">
                <input type="file" id="photo-upload" accept="image/*" style="padding-left: 00px;">
                <div id="photo-container">
                    <img id="photo-preview" src="" alt="Uploaded Photo">
                </div>
            </div>
        </div>
        <br>
        <br>

        

        <div class="task_section">

            <button id="all-tasks" onclick="loadTasks('all')">All Tasks</button>
            <button id="ongoing-tasks" onclick="loadTasks('ongoing')">Ongoing Tasks</button>
            <button id="completed-tasks" onclick="loadTasks('completed')">Completed Tasks </button>
            <button id="paused-tasks" onclick="loadTasks('paused')">Paused Tasks</button>
            <br>
            <br>
            
            <div class="content_tasks">
                <table id="task-table">
                    <tr>
                        <th>Task ID</th>
                        <th>Assigned date</th>
                        <th>Task Details</th>
                        <th>Status</th>
                    </tr>
                    <!-- PHP code to fetch data and display rows ...-->
                    <?php
                        if ($result->num_rows > 0) {
                            // Output data of each row
                            while ($row = $result->fetch_assoc()) {
                                // if($row['user_id'] == 3)
                                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["allotment_date"]. "</td><td>" . $row["task_details"]. "</td><td>" . $row["status"]. "</td></tr>";
                            }
                        } else {
                            echo "No tasks found";
                        }
                    ?> 

                    
                </table>
            </div>
        </div>
       
        


    </div>

    <script>
        const photoUpload = document.getElementById('photo-upload');
        const photoPreview = document.getElementById('photo-preview');

        photoUpload.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                reader.addEventListener('load', function() {
                    photoPreview.src = this.result;
                });

                reader.readAsDataURL(file);
            } else {
                photoPreview.src = '';
            }
        });

    
    function loadTasks(status) {

        const userId = <?php echo $personal['id']?>;
        location.href = window.location.pathname + '?task_status=' + status +'&user_id=' + userId;
    }
</script> 



</body>

</html>