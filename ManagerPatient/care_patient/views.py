from django.shortcuts import render
from rest_framework import generics
from .care_serializer import *
from .models import *

# Create your views here.
class EmployerEnChargePatient(generics.ListCreateAPIView):
    queryset=Employer.objects.using("patient").all()
    serializer_class =EmployerSerializer

class DetailEmployerEnChargePatient(generics.RetrieveAPIView):
    queryset=Employer.objects.using("patient").all()
    serializer_class =EmployerSerializer

class FacturePatient(generics.ListCreateAPIView):
    queryset=Facture.objects.using("patient").all()
    serializer_class=FactureSerializer


class DetailFacturePatient(generics.RetrieveAPIView):
    queryset=Facture.objects.using("patient").all()
    serializer_class=FactureSerializer

class ServiceToPatient(generics.ListCreateAPIView):
    queryset=Service.objects.using("patient").all()
    serializer_class=ServiceSerializer


class DetailServiceToPatient(generics.RetrieveAPIView):
    queryset=Service.objects.using("patient").all()
    serializer_class=ServiceSerializer

class TacheParJour(generics.ListCreateAPIView):
    queryset=Travailler.objects.using('patient').all()
    serializer_class=TravaillerSerializer


class DeatilTacheParJour(generics.RetrieveAPIView):
    queryset=Travailler.objects.using('patient').all()
    serializer_class=TravaillerSerializer



class RendezVousPatient(generics.ListCreateAPIView):
    queryset=RendezVous.objects.using('patient').all()
    serializer_class=RdvSerializer


class DetailRendezVousPatient(generics.RetrieveAPIView):
    queryset=RendezVous.objects.using('patient').all()
    serializer_class=RdvSerializer