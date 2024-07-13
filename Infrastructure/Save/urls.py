from django.urls import path
from .views import *

urlpatterns = [
    path('', ListeBatiment.as_view(), name="batiment"),
    path('Batiment/<str:pk>/Datail', ListeBatiment.as_view(), name="batimentDetail"),
    path('Equipement/<str:pk>/Detail', DetailEquipement.as_view(), name="detailEquipement"),
    path('Equipement/', ListeEquipement.as_view(), name="equipement"),
    path('Salle/', ListeSalle.as_view(), name="salle"),
    path('Salle/<str:pk>/Detail', ListeSalle.as_view(), name="salleDetail"),
    path('Niveau/', ListeNiveau.as_view(), name="niveau"),
    path('Niveau/<str:pk>/Detail', ListeNiveau.as_view(), name="niveauDetail"),
    path("OccupationSalle/", OccupationSalle.as_view())
]
