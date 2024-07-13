from django.shortcuts import render
from rest_framework import generics
from .care_serializer import *
from .models import *
from rest_framework.views import APIView
from save_patient.save_patient_serializer import *
from rest_framework.response import Response


class OccupeLaSalleListe(generics.ListCreateAPIView):
    queryset=occupe=OccupationSalle.objects.using("patient").all()
    serializer_class=OccupationSerializer
    
class OccupeLaSalle(APIView):
    def get(self, _, pk=None):
        occupe=OccupationSalle.objects.using("patient").filter(salle_id=pk)
        serializer=OccupationSerializer(occupe, many=True)
        return Response(serializer.data)


# Create your views here.
class EmployerEnChargePatient(generics.ListCreateAPIView):
    queryset=Employer.objects.using("patient").all()
    serializer_class =EmployerSerializer

class UpdateEmployerEnChargePatient(generics.UpdateAPIView):
    queryset=Employer.objects.all()
    serializer_class=EmployerSerializer

class DeleteEmployerEnChargePatient(generics.DestroyAPIView):
   queryset=Employer.objects.using("patient").all()
   serializer_class =EmployerSerializer
   
class DetailEmployerEnChargePatient(generics.RetrieveAPIView):
    queryset=Employer.objects.using("patient").all()
    serializer_class =EmployerSerializer


class FacturePatient(generics.ListCreateAPIView):
    queryset=Facture.objects.using("patient").all()
    serializer_class=FactureSerializer

class DeleteFacturePatient(generics.DestroyAPIView):
    queryset=Facture.objects.using("patient").all()
    serializer_class=FactureSerializer

class UpdateFacturePatient(generics.UpdateAPIView):
    queryset=Facture.objects.using("patient").all()
    serializer_class=FactureSerializer

class DetailFacturePatient(generics.RetrieveAPIView):
    queryset=Facture.objects.using("patient").all()
    serializer_class=FactureSerializer

class ServiceToPatient(generics.ListCreateAPIView):
    queryset=Service.objects.using("patient").all()
    serializer_class=ServiceSerializer

class DeleteServiceToPatient(generics.DestroyAPIView):
    queryset=Service.objects.using("patient").all()
    serializer_class=ServiceSerializer


class UpdateServiceToPatient(generics.UpdateAPIView):
    queryset=Service.objects.using("patient").all()
    serializer_class=ServiceSerializer


class DetailServiceToPatient(generics.RetrieveAPIView):
    queryset=Service.objects.using("patient").all()
    serializer_class=ServiceSerializer

class TacheParJour(generics.ListCreateAPIView):
    queryset=Travailler.objects.using('patient').all()
    serializer_class=TravaillerSerializer

class UpdateTacheParJour(generics.UpdateAPIView):
    queryset=Travailler.objects.using('patient').all()
    serializer_class=TravaillerSerializer

class DeleteTacheParJour(generics.DestroyAPIView):
    queryset=Travailler.objects.using('patient').all()
    serializer_class=TravaillerSerializer

class DetailTacheParJour(generics.RetrieveAPIView):
    queryset=Travailler.objects.using('patient').all()
    serializer_class=TravaillerSerializer



class RendezVousPatient(generics.ListCreateAPIView):
    queryset=RendezVous.objects.using('patient').all()
    serializer_class=RdvSerializer


class DetailRendezVousPatient(generics.RetrieveAPIView):
    queryset=RendezVous.objects.using('patient').all()
    serializer_class=RdvSerializer

class PrendreUnRendezVous(APIView):
    def get(self, _, pk=None):
        rdv=RendezVous.objects.using("patient").filter(personnel_rdv=pk)
        serializeur=RdvSerializer(rdv, many=True)
        return Response(serializeur.data)