<?php include "common/application_top.php";?>
    <div class="container">
        <h1>User Data</h1>
        <table style="width: 100%;margin: auto;background-color: #ffffff;color: #000;padding-top: 10px;margin-top: 10px;">
            <thead>
            <tr>
                <td>User ID</td>
                <td>Name</td>
                <td>DOB</td>
                <td>Email</td>
                <td>Register Time</td>
                <td>Status</td>
            </tr>
            </thead>
            <tbody>
            <?php if(!empty($users)){?>
                <?php foreach($users as $row){?>
                    <tr>
                        <td><?php echo $row->user_id;?></td>
                        <td><?php echo $row->user_fname." ".$row->user_lname;?></td>
                        <td><?php echo $row->user_dob;?></td>
                        <td><?php echo $row->user_email;?></td>
                        <td><?php echo $row->register_time;?></td>
                        <td>
                            <?php
                            if($row->isActive == '1')
                            {
                                echo '<a href="'.base_url().'admin/active_update/'.$row->user_id.'/1">Active</a>';
                            }
                            else
                            {
                                echo '<a href="'.base_url().'admin/active_update/'.$row->user_id.'/0">Not Active</a>';
                            }
                            ?>
                        </td>

                    </tr>
                <?php }?>
            <?php }else{?>
                <tr>
                    <td colspan="6">0 Result Found</td>
                </tr>
    <?php }?>
            </tbody>
        </table>
    </div>
    <section id="m-a-n">
        <article class="club-post">
            <div class="club-content">

                <div class="col-3">
                </div>

            </div>
            </div>
        </article>
    </section>

<?php include "common/application_bottom.php";?>