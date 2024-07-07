from django.urls import path
from .views import *

urlpatterns = [
    path("", ListePatient.as_view(), name="ListePatient"),
    path("CreatePatient/", ListCreatePatient.as_view(), name="SavePatient"),
    path("UpdatePatient/<str:pk>", UpdatePatient.as_view(), name="update"),
    path("DeletePatient/<str:pk>", DeletePatient.as_view(), name="delete"),
    path("DetailPatient/<str:pk>", DetailPatient.as_view(), name="detail"),
]
