from django.shortcuts import render
from rest_framework.response import Response
from rest_framework import generics
from Save.models import *
from .save_seria import *
from rest_framework.views import APIView
import requests


class OccupationSalle(APIView):
    def get(self, request):
        salles=Salle.objects.using("IS").all()
        return Response([self.formatSalle(s) for s in salles])
    
    def formatSalle(self, salle):
        patient=requests.get("http://0.0.0.0:8001/Care/Patient/%d/occupe" % salle.id).json()
        return{
            "id":salle.id,
            "nom_salle":salle.nom_salle,
            "type_salle":salle.type_salle,
            "Patients":patient

        }

class ListeEquipement(generics.ListCreateAPIView):
    queryset=Posseder.objects.using('IS').all()
    serializer_class=PossederSerializer


class DetailEquipement(generics.RetrieveAPIView):
    queryset=Posseder.objects.using('IS').all()
    serializer_class=PossederSerializer

class ListeSalle(generics.ListCreateAPIView):
    queryset=Salle.objects.using('IS').all()
    serializer_class=SalleSerializer


class DetaileSalle(generics.RetrieveAPIView):
    queryset=Salle.objects.using('IS').all()
    serializer_class=SalleSerializer

class ListeBatiment(generics.ListCreateAPIView):
    queryset=Batiment.objects.using('IS').all()
    serializer_class=BatimentSerializer


class DetailBatiment(generics.RetrieveAPIView):
    queryset=Batiment.objects.using('IS').all()
    serializer_class=BatimentSerializer

class ListeNiveau(generics.ListCreateAPIView):
    queryset=Niveau.objects.using('IS').all()
    serializer_class=NiveauSerializer

class DetailNiveau(generics.RetrieveAPIView):
    queryset=Niveau.objects.using('IS').all()
    serializer_class=NiveauSerializer