from django.shortcuts import render
import requests
from rest_framework import generics
from .models import Soin
from .serializer import *
from rest_framework.response import Response
from rest_framework.views import APIView


class CreationDesSoins(generics.ListCreateAPIView):
    queryset=SoinSerialiser
    serializer_class=Soin.objects.using("RH").all()

class ListeDesSoins(APIView):
    def get(self, request):
        soin=Soin.objects.using("RH").all()
        return Response([])
    
    def formatSoin(self, soin):
        return {
            "soin_id": soin.id,
            "numero_employer":soin.employer_id,
            "numero_patient":soin.patient_id,
            "jour_arrive":soin.jour_arrive,
            "jour_sorti":soin.jour_sorti,
        }