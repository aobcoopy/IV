<script style="text/javascript">
	var s = '';
	s += '<div class="btn-group pull-right">';
		s += '<button class="btn btn-info dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>';
		s += '<ul class="dropdown-menu">';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'json\',escape:\'false\'});"><img src=\'libs/img/icons/json.png\' width="24"/> JSON</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'json\',escape:\'false\',ignoreColumn:\'[2,3]\'});"><img src=\'libs/img/icons/json.png\' width="24"/> JSON (ignoreColumn)</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'json\',escape:\'true\'});"><img src=\'libs/img/icons/json.png\' width="24"/> JSON (with Escape)</a></li>';
			s += '<li class="divider"></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'xml\',escape:\'false\'});"><img src=\'libs/img/icons/xml.png\' width="24"/> XML</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'sql\'});"><img src=\'libs/img/icons/sql.png\' width="24"/> SQL</a></li>';
			s += '<li class="divider"></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'csv\',escape:\'false\'});"><img src=\'libs/img/icons/csv.png\' width="24"/> CSV</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'txt\',escape:\'false\'});"><img src=\'libs/img/icons/txt.png\' width="24"/> TXT</a></li>';
			s += '<li class="divider"></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'excel\',escape:\'false\'});"><img src=\'libs/img/icons/xls.png\' width="24"/> XLS</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'doc\',escape:\'false\'});"><img src=\'libs/img/icons/word.png\' width="24"/> Word</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'powerpoint\',escape:\'false\'});"><img src=\'libs/img/icons/ppt.png\' width="24"/> PowerPoint</a></li>';
			s += '<li class="divider"></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'png\',escape:\'false\'});"><img src=\'libs/img/icons/png.png\' width="24"/> PNG</a></li>';
			s += '<li><a href="#" onClick ="$(\'#tblGroup\').tableExport({type:\'pdf\',escape:\'false\'});"><img src=\'libs/img/icons/pdf.png\' width="24"/> PDF</a></li>';
		s += '</ul>';
	s += '</div>';
	$("#panel-heading-group").append(s);
</script>
	