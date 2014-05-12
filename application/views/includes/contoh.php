<script>
	$("#business_name").typeahead({
	    minLength: 3,
	    source: function(query, process) {
			$.post("entity/search", {q: query, type: selectBoxValue }, function(data) {
				 objects = []; // going to browser
				 map = {}; // storing for later
				 $.each(data, function(i, entity) {
		            map[entity.name] = school;
		            objects.push(entity.name);
		        });
		        return process(objects);
			},"json");
	    },
		updater: function (item) {
			// update hidden field with ID
			$('#entity_id').val(map[item].id);
			

			return item;
		}
	});
</script>

<script>
$('#search').typeahead({
    source: function(q, process){
        return $.get('json.php', {q: q}, function(response) {
            var data = new Array;
            for(var i in response) {
                data.push(response[i]['id'] +"#"+ response[i]['name'] +"#"+ response[i]['img'] +"#"+ response[i]['loc']);
            }
            return process(data);
        });
    },
    highlighter: function(item) {
        var parts = item.split('#'),
        html = '<div class="typeahead">';
        html += '<div class="left"><img src="assets/img/'+parts[2]+'" width="32" height="32" class="img-rounded"></div>'
        html += '<div class="left">';
        html += '<div>'+parts[1]+'</div>';
        html += '<div>'+parts[3]+'</div>';
        html += '</div>';
        html += '<div class="clear"></div>';
        html += '</div>';
        return html;
    },
    updater: function(item) {
        var parts = item.split('#');
        return parts[1];
    },
});
</script>


<?php
header('Content-type: application/json');
$data[] = array('id'=>1, 'name'=>'Juventus', 'img'=>'juve.png', 'loc'=>'Juventus Arena, Turin');
$data[] = array('id'=>2, 'name'=>'AC Milan', 'img'=>'ac_milan.png', 'loc'=>'San Siro, Milan');
$data[] = array('id'=>3, 'name'=>'Inter Milan', 'img'=>'inter_milan.png', 'loc'=>'Giuseppe Meazza, Milan');
$data[] = array('id'=>4, 'name'=>'SS Lazio', 'img'=>'lazio.png', 'loc'=>'Olimpico, Roma');
$data[] = array('id'=>5, 'name'=>'AS Roma', 'img'=>'as_roma.png', 'loc'=>'Olimpico, Roma');
$data[] = array('id'=>6, 'name'=>'Parma', 'img'=>'parma.png', 'loc'=>'Ennio Tardini, Parma');
$data[] = array('id'=>7, 'name'=>'Fiorentina', 'img'=>'fiorentina.png', 'loc'=>'Artemio Franchi');
$data[] = array('id'=>8, 'name'=>'Napoli', 'img'=>'napoli.png', 'loc'=>'San Paolo, Napoli');
echo json_encode($data);
?>