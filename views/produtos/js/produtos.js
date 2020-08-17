$(document).ready(function(){
	lista();
	listaCarrinho();
		
	function lista(){
	
		$.post('produtos/lista/', function(data) {
		  data=JSON.parse(data);
		 
		  $("#tabres").find("tr:gt(0)").remove();
			for (var i = 0; i < data.length; i++){
				$('#lsprodutos').append('<tr><td>' + data[i].codigo + '</td><td>' + data[i].descricao + '</td><td>' + data[i].valor + '</td><td><button class="addCarrinho btn btn-xs btn-default" valor="'+data[i].codigo+'" type="button"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button></td></tr>');
			}
			
		});
		
	}

	$(document).on("click",".addCarrinho",function(){
		var pro=$(this).attr("valor");
		$.post('produtos/addCarrinho/',{ codproduto: pro }).done(function(data) {
			listaCarrinho();			  
		  });

	});

	$(document).on("click",".rmCarrinho",function(){
		var pro=$(this).attr("valor");
		$.post('produtos/rmCarrinho/',{ codproduto: pro }).done(function(data) {
			listaCarrinho();			  
		  });

	});

	function listaCarrinho(){


			$.post('produtos/listaCarrinho/', function(data) {
				
				$("#tabcarrinho").find("tr:gt(0)").remove();
				try{
				data=JSON.parse(data);		
				for (var i = 0; i < data.length; i++){
					$('#lscarrinho').append('<tr><td>' + data[i].codigo + '</td><td>' + data[i].descricao + '</td><td>' + data[i].valorun + '</td><td>' + data[i].qtd + '</td><td>' + data[i].valortotal + '</td><td><button class="rmCarrinho btn btn-xs btn-default" valor="'+data[i].codigo+'" type="button"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button></td></tr>');
				}
			}
			catch(ee){

			}
				
			});
		}
	

	
});