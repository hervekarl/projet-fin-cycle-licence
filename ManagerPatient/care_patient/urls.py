from django.urls import path
from .views import *

urlpatterns = [
    path("", ServiceToPatient.as_view(), name="Service"),
    path("Service/<int:pk>/Detail", DetailServiceToPatient.as_view(), name="ServiceDetail"),
    path("Facture/", FacturePatient.as_view(), name="Facture"),
    path("Facture/<int:pk>/Detail", DetailFacturePatient.as_view(), name="FactureDetail"),
    path("Travaille/", TacheParJour.as_view(), name="Tache"),
    path("Travaille/<int:pk>/Detail", DetailTacheParJour.as_view(), name="TacheDetail"),
    path("ChargeDuPatient/", EmployerEnChargePatient.as_view(), name="ResponsablePatient"),
    path("ChargeDuPatient/<int:pk>/Detail", DetailEmployerEnChargePatient.as_view(), name="detailPersonel"),
    path("Rendez-vous/", RendezVousPatient.as_view(), name='Rdv'),
    path("Rendez-vous/<int:pk>/Detail", DetailRendezVousPatient.as_view(), name='RdvDetail'),
    path("Patient/<str:pk>/occupe", OccupeLaSalle.as_view()),
    path("occupation/", OccupeLaSalleListe.as_view())
]
