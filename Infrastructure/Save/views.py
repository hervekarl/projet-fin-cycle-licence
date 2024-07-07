from django.shortcuts import render
from rest_framework import generics
from Save.models import *
from .save_seria import *


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