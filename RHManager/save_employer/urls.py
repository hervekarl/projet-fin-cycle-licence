from django.urls import path, include
from .views import *

urlpatterns = [
    path("", ListeEmployer.as_view(), name='employer'),
    path("Service/", ListeService.as_view(), name='service'),
    path("Fonction/", ListeFonction.as_view(), name="fonction"),
    path("Employer/<int:pk>/Detail", DetailEmployer.as_view(), name='employerdetail'),
    path("Service/<int:pk>/Detail", DetailService.as_view(), name='servicedetail'),
    path("Fonction/<int:pk>/Detail", DetailFonction.as_view(), name="fonctiondetail"),
    
]

