<a href="?app=chat_group">
<div class="widget widget-warning widget-item-icon" onclick="location.href='pages-messages.html';">
    <div class="widget-item-left">
        <span class="fa fa-comments-o  "></span>
    </div>
    <div class="widget-data">
        <div class="widget-int num-count"><?php echo $dbc->GetCount("messages","status >= 0");?></div>
        <div class="widget-title">Auto Message</div>
        <div class="widget-subtitle">In your Website</div>
    </div>     
    <!--<div class="widget-controls">  
        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="top" title="Remove Widget"><span class="fa fa-times"></span></a>
    </div>-->
</div>
</a>

