$(".column-sortable").click(
		function()
		{
			var field = $(this).data("field");
			var sortDirection = $(this).data("sortdirection") == null ? "desc" : $(this).data("sortdirection");

			var element = this;
			
			if(data == null)
			{
				data = {};
			}
			
			data["field"] = field;
			data["sortDirection"] = sortDirection;
							
			$.ajax({
				type:"POST",
				data: data,
				url: baseUrl + 'index.php/' + controller + '/' + ajaxMethod + '/',
				success:
					function(data)
					{
						$("#" + table + " > tbody").hide().html(data).fadeIn();

						if(sortDirection == "asc")
						{
							$(element).data("sortdirection", "desc");
						}
						else 
						{
							$(element).data("sortdirection", "asc");
						}
					},
				error:
					function(xhr, status, error)
					{
						$("#" + table +  " > tbody").html("An error has occurred");
					}
			});
		}
	);

	$(".searchFilter").keyup(
			function()
			{				
				var search = $(this).val();		
				
				if(data == null)
				{
					data = {};
				}
				
				data["search"] = search;
				
				$.ajax({
					type:"POST",
					data: data,
					url: baseUrl + 'index.php/' + controller + '/' + ajaxMethod + '/',
					success:
						function(data)
						{
							$("#" + table + " > tbody, div#" + table + "").hide().html(data).fadeIn();
						},
					error:
						function(xhr, status, error)
						{
							$("#" + table + " > tbody, div#" + table + "").html("An error has occurred");
						}
				});
			}
	); 