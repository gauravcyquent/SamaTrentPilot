<?php
/**
 * Created by PhpStorm.
 * User: Parmod Bhardwaj<parmod@orangemantra.com>
 * Date: 5/4/2016
 * Time: 6:56 PM
 */
?>
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10"><h2>Activity Report</h2></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-md-12">
            <div class="ibox float-e-margins activity-report-label">
                <?php if (@$error): ?>
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <i class="fa fa-warning"></i> Warning Panel
                        </div>
                        <div class="panel-body">
                            <p><?php //echo $error;  ?>Please fill all mandatory fields.</p>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="panel panel-success " id="flash-message">
                        <div class="panel-heading">
                            Success Panel
                        </div>
                        <div class="panel-body">
                            <p><?php echo $this->session->flashdata('message'); ?></p>
                        </div>
                    </div>
                <?php } ?>
                <form method="post" class="form-horizontal">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="ibox-content">
                                <div class="height-min">
                                    <div class="form-group lead-forms2 follow-up1">
                                        <div class="add-st">
                                            <label class="red-high">Status*:</label>
                                            <select name="status" class="selectpicker">
                                                <option value="">Status</option>
                                                <option value="Unallocated">Unallocated</option>
                                                <option value="Allocated">Allocated</option>
                                                <option value="Engaged">Engaged</option>
                                                <option value="Application Ongoing">Application Ongoing</option>
                                                <option value="Pending Approval">Pending Approval</option>
                                                <option value="Onboarding">Onboarding</option>
                                                <option value="Withdrawn">Withdrawn</option>
                                                <option value="Rejected">Rejected</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="follow-up">Meeting Schedule</div>
                                    <div class="form-group lead-forms2">
                                        <label>Company Name:</label>
                                        <select name="company" class="selectpicker">
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
                                        <label class="red-high">Activity*:</label>
                                        <select name="name" class="selectpicker">
                                            <option value="">Select Activity</option>
                                            <option value="Visit">Visit</option>
                                            <option value="Call">Call</option>
                                            <option value="Mail">Mail</option>
                                        </select>
                                    </div>
                                    <div class="form-group lead-forms2">
                                        <label>Purpose</label>
                                        <select name="purpose" class="selectpicker">
                                            <option value="Initial contact">Initial Contact</option>
                                            <option value="Follow-up">Follow-Up</option>
                                            <option value="Application Preparation">Application Preparation</option>
                                            <option value="Application re-work">Application Re-work</option>
                                            <option value="Onboarding">Onboarding</option>
                                        </select>
                                    </div>
                                    <div class="form-group lead-forms2">
                                        <label>Start:</label>
                                        <input type="text" name="start_date" class="form-control required" placeholder="Start" aria-required="true"> 
                                    </div>
                                    <div class="form-group lead-forms2">
                                        <label>End:</label>
                                        <input type="text" name="end_date" class="form-control required" placeholder="Ends" aria-required="true"> 
                                    </div>
                                    <div class="clearfix">&nbsp;</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="ibox-content">
                                <div class="height-min">
                                    <div class="form-group lead-forms2 follow-up1">
                                        <div class="add-st">
                                            <label class="red-high">Priority*</label>
                                            <select name="priority" class="selectpicker">
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
                                        <select class="selectpicker">
                                            <option value="">Select Activity</option>
                                            <option value="Visit">Visit</option>
                                            <option value="Call">Call</option>
                                            <option value="Mail">Mail</option>
                                        </select>
                                    </div>
                                    <div class="form-group lead-forms2">
                                        <label>Purpose:</label>
                                        <select class="selectpicker">
                                            <option value="Initial contact">Initial Contact</option>
                                            <option value="Follow-up">Follow-Up</option>
                                            <option value="Application Preparation">Application Preparation</option>
                                            <option value="Application re-work">Application Re-work</option>
                                            <option value="Onboarding">Onboarding</option>
                                        </select>
                                    </div>
                                    <div class="form-group lead-forms2">
                                        <label>Start:</label>
                                        <input type="text" class="form-control required" placeholder="Status" aria-required="true"> 
                                    </div>
                                    <div class="form-group lead-forms2">
                                        <label>End:</label>
                                        <input type="text" class="form-control required" placeholder="Ends" aria-required="true"> 
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="lead-details">
                            <div class="input-group space-top col-sm-12">
                                <label class="control-label">Report :</label>
                                <textarea rows="4" cols="50" class="form-control" width="100%" name="description">
                                </textarea>
                            </div>
                        </div>
                        <div class="lead-details-btns-area">
                         <button type="submit" class="btn btn-primary btn-w-m">Save</button>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>


            </div>
        </div>
    </div>
</div>