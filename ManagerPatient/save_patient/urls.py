from django.urls import path
from .views import *

urlpatterns = [
    path("", ListePatient.as_view(), name="ListePatient"),
    path("CreatePatient/", ListCreatePatient.as_view(), name="SavePatient"),
    path("Patient/<str:pk>/Update", UpdatePatient.as_view(), name="update"),
    path("Patient/<str:pk>/Delete", DeletePatient.as_view(), name="delete"),
    path("Patient/<str:pk>/Detail", DetailPatient.as_view(), name="detail"),
]
