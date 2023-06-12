<a href="?app=contact">
<div class="widget widget-warning widget-item-icon" onclick="location.href='pages-messages.html';">
    <div class="widget-item-left">
        <span class="fa fa-envelope"></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $dbc->GetCount("contact_us","property IS  NULL AND status = 0");?></div>
        <div class="widget-title">Contact Us</div>
        <div class="widget-subtitle">New messages</div>
    </div>     
    <!--<div class="widget-controls">  
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
    </div>-->
</div>
</a>