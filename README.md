# calculo_de_frete
Projeto em php simples que realizei para trabalhar com fretes baseado em uma fiorino 1.3 flex (porém pode-se usar para qualquer veiculo),
calcula o valor do frete baseando-se no consumo, valor do combustivel e km percorrida.
Pode-se personalizar o valor do combustivel, consumo médio e tambem o multiplicador.
O calculo do frete utiliza a api do google maps api chamada ("distance matrix") para obter as distancias entre pontos.
Possui função autocomplete dos endereços baseado em geolocalização da api do google map chamada ("Place Autocomplete").


***************************************************************************************************************************
#                                       A   T   E   N   Ç   Ã   O   !   !   !                                             
                                                                                                                        
     PARA UTILIZAÇÃO DEVERÁ PRIMEIRAMENTE CADASTRAR UMA CHAVE DE API PARA O                                              
     DISTANCE MATRIX  NO GOOGLE CLOUND PLATFORM CONFORME DESCRITO NA DOCUMENTAÇÃO                                        
     DO GOOGLE MAPS API : https://developers.google.com/maps/documentation/javascript/distancematrix?hl=en#GetStarted    
     ESSA CHAVE TAMBEM SERVIRÁ  PARA O PLACE AUTOCOMPLETE !                                                              
     COM A CHAVE GERADA, NO ARQUIVO "config.php", NO CAMPO "CHAVES DE API", INSERIR A CHAVE GERADA PARA QUE O SISTEMA    
     POSSA FUNCIONAR!!!                                                                                            
	
