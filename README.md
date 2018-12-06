 1) Utwórz usługę REST we frameworku Yii służącą do gromadzenia i udostępniania danych na temat [np.: zanieczyszczenia powietrza/poziomu paliwa/ceny aktywów]. 
Usługa powinna udostępniać następujące endpointy:

1. POST /update - przyjmować w body obiekt typu JSON z jednym atrybutem o nazwie value  (wartość typu double).
przykładowy request:  
{ „value”: 12.92 }
2. GET /stats - zwraca w formacie JSON wszystkie uśrednione dane od początku pomiaru
Przykładowa odpowiedź: 
{ „avg” : 9.123,
„max”, 12.92,
„min”, 5.22,  
„time-start”: „2016-02-10T10:22:44”, 
„time-end”,"2017-01-01T08:00:12” }

Dane powinny być trzymane w pamięci usługi i po jej restarcie mogą zostać utracone. Uwzględnij, że w przyszłości może być potrzeba przechowywania danych w innym magazynie danych np. w bazie danych SQL.
Uwzględnij również, że usługa /stats może być wywoływana przez bardzo dużą ilość klientów, natomiast nie wiemy jak często będzie wywoływana /update.
Wykonanie testów automatycznych logiki jest opcjonalne. 
