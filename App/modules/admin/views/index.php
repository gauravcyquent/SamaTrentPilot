<script>
    var activities = [];
<?php foreach ($result as $data) : ?>
        var data = {
            id: <?php echo $data->activity_id ?>,
            title: "<?php echo $data->name ?>",
            start: new Date("<?php echo date("F d, Y H:i:s", strtotime($data->start_date)) ?>"),
            end: new Date("<?php echo date("F d, Y H:i:s", strtotime($data->end_date)) ?>"),
            allDay: false,
            className: "<?php echo $data->name ?>",
        };
        activities.push(data);
        var base_url = "<?php echo base_url(); ?>";
<?php endforeach; ?>
</script>
<?php if ($this->session->flashdata('message')) { ?>

    <div class="panel panel-success" id="flash-message">
        <div class="panel-heading">
            Success Panel
        </div>
        <div class="panel-body">
            <p><?php echo $this->session->flashdata('message'); ?></p>
        </div>
    </div>
<?php } ?>
<div class="wrapper wrapper-content">
    <div class="row animated fadeInDown">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <?php
                    $roleArray = array('1' => 'head', '2' => 'rrm', '3' => 'home', '4' => 'hunter', '5' => 'Rroleade');
                    $roleId = @$this->session->userdata('role');
                    if ($roleId == '2') {
                        ?>
                        <h5>Task Pipeline</h5>
                    <?php } else { ?>
                        <h5>Task Pipeline</h5>
                    <?php } ?>
                </div>
                <div class="ibox-content">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="calenderActivity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm2">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Events</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="post" id="calenderForm">
                    <div class="col-sm-6 col-md-6">

                        <div class="height-min">
                            <div class="form-group lead-forms2 follow-up1">
                                <div class="add-st">
                                    <label class="red-high">Status*:</label>
                                    <select name="status" class="form-control">
                                        <option value="">Status</option>
                                        <option value="Interested">Interested</option>
                                        <option value="Application Prepration">Application Prepration</option>
                                        <option value="Accepted by CF">Accepted by CF</option>
                                        <option value="Appealed">Appealed</option>
                                        <option value="Approved">Approved</option>
                                        <option value="Disbursed">Disbursed</option>
                                        <option value="Withdrawn">Withdrawn</option>
                                        <option value="Rejected">Rejected</option>
                                        <option value="Reffered">Reffered</option>
                                    </select>
                                </div>
                            </div>
                            <div class="follow-up">Meeting Schedule</div>
                            <div class="form-group lead-forms2">
                                <label>Company Name:</label>
                                <select name="company" class="form-control" required>
                                    <option value="">Select Company Name</option>
                                    <option value="Aluminium Light Metal Indonesia">Aluminium Light Metal Indonesia</option>
                                    <option value="Jindal Stainless Steel">Jindal Stainless Steel</option>
                                    <option value="Steel Pipe Industry Indonesia">Steel Pipe Industry Indonesia</option>
                                    <option value="Ispat Indo">Ispat Indo</option>
                                    <option value="Papajaya Agung">Papajaya Agung</option>
                                    <option value="Total Bangun Persada">Total Bangun Persada</option>
                                    <option value="Hutama Karya">Hutama Karya</option>
                                    <option value="Wijaya Karya ">Wijaya Karya </option>
                                    <option value="Adhi Karya">Adhi Karya</option>
                                    <option value="Pembangunan Perumahan">Pembangunan Perumahan</option>
                                </select>
                            </div>
                            <div class="form-group lead-forms2">
                                <label class="">Activity:</label>
                                <select name="activity" class="form-control" onchange="setEndDate(this.value)">
                                    <option value="0">Select Activity</option>
                                    <option value="Visit">Visit</option>
                                    <option value="Call">Call</option>
                                </select>
                            </div>
                            <div class="form-group lead-forms2">
                                <label>Purpose</label>
                                <select name="purpose" class="form-control">
                                    <option value="Initial contact">Initial Contact</option>
                                    <option value="Follow-up">Follow-Up</option>
                                    <option value="Application Preparation">Application Preparation</option>
                                    <option value="Application re-work">Application Re-work</option>
                                    <option value="Onboarding">Onboarding</option>
                                </select>
                            </div>
                            <div class="form-group lead-forms2">
                                <label>Start Time :</label>
                                <input type="text" name="start_dates" class="form-control" placeholder="Start" aria-required="true" id="starts"> 
                            </div>
                            <div class="form-group lead-forms2">
                                <label>End Time :</label>
                                <input type="text" name="end_dates" class="form-control" placeholder="Ends" aria-required="true" id="ends">

                            </div>
                            <div class="clearfix">&nbsp;</div>
                        </div>

                    </div>
                    <div class="col-sm-6 col-md-6">
                        <div class="height-min">
                            <div class="form-group lead-forms2 follow-up1">
                                <div class="add-st">
                                    <label class="red-high">Priority*</label>
                                    <select name="priority" class="form-control">
                                        <option value="">Select Priority</option>
                                        <option value="1">High</option>
                                        <option value="2">Medium</option>
                                        <option value="3">Low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="follow-up">Follow-up Meeting Schedule</div>
                            <div class="form-group lead-forms2">
                                <label>Activity:</label>
                                <select class="form-control">
                                    <option value="0">Select Activity</option>
                                    <option value="Visit">Visit</option>
                                    <option value="Call">Call</option>
                                </select>
                            </div>
                            <div class="form-group lead-forms2">
                                <label>Purpose:</label>
                                <select class="form-control">
                                    <option value="Initial contact">Initial Contact</option>
                                    <option value="Follow-up">Follow-Up</option>
                                    <option value="Application Preparation">Application Preparation</option>
                                    <option value="Application re-work">Application Re-work</option>
                                    <option value="Onboarding">Onboarding</option>
                                </select>
                            </div>
                            <div class="form-group lead-forms2">
                                <label>Start:</label>
                                <input type="text" class="form-control" placeholder="Starts" aria-required="true"> 
                            </div>
                            <div class="form-group lead-forms2">
                                <label>End:</label>
                                <input type="text" class="form-control" placeholder="Ends" aria-required="true"> 
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>
                    <div class="col-sm-12">
                        <div class="input-group space-top col-sm-12">
                            <label class="control-label">Note </label>
                            <textarea rows="4" cols="50" class="form-control" width="100%" name="description">

                            </textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="btn btn-w-m btn-primary pull-right btn-m-top">Save</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>

    </div>
</div>

<div class="modal inmodal" id="calenderSingleActivity" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title cal_activity_title">Activity Title</h4>
            </div>
            <div class="modal-body">
                <div class="form-group popup-form1">
                    <label class="col-sm-4 control-label">Company :</label>
                    <div class="col-sm-8">
                        <div id="cal_activity_company"> </div>
                    </div>
                </div>
                <div class="form-group popup-form1">
                    <label class="col-sm-4 control-label">Purpose :</label>
                    <div class="col-sm-8">
                        <div id="cal_activity_purpose"> </div>
                    </div>
                </div>
                <div class="form-group popup-form1">
                    <label class="col-sm-4 control-label">Note</label>
                    <div class="col-sm-8">
                        <div id="cal_activity_notes"></div>
                    </div>
                </div>
                <div class="form-group popup-form1">
                    <label class="col-sm-4 control-label">Start Time</label>
                    <div class="col-sm-8">
                        <div id="cal_activity_start_time"></div>
                    </div>
                </div>
                <div class="form-group popup-form1">
                    <label class="col-sm-4 control-label">End Time</label>
                    <div class="col-sm-8">
                        <div id="cal_activity_end_time"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

    </div>
</div>

