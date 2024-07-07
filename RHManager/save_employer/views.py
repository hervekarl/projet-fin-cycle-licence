from django.shortcuts import render
from rest_framework import generics
from .models import *
from .serializer_save_emp import *

class ListeEmployer(generics.ListCreateAPIView):
    queryset=Employer.objects.using('RH').all()
    serializer_class=EmployerSerializer

class ListeService(generics.ListCreateAPIView):
    queryset=Service.objects.using('RH').all()
    serializer_class=ServiceSerializer

class ListeFonction(generics.ListCreateAPIView):
    queryset=FonctionsEmp.objects.using('RH').all()
    serializer_class=FonctionSerializer


class DetailEmployer(generics.RetrieveAPIView):
    queryset=Employer.objects.using('RH').all()
    serializer_class=EmployerSerializer

class DetailService(generics.RetrieveAPIView):
    queryset=Service.objects.using('RH').all()
    serializer_class=ServiceSerializer

class DetailFonction(generics.RetrieveAPIView):
    queryset=FonctionsEmp.objects.using('RH').all()
    serializer_class=FonctionSerializer
