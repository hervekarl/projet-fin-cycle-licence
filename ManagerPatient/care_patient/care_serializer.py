from rest_framework import serializers
from .models import *

class EmployerSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name="detailPersonel", lookup_field='pk')
    class Meta:
        model = Employer
        fields="__all__"
       
class TravaillerSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name="TacheDetail", lookup_field='pk')
    class Meta:
        model = Travailler
        fields="__all__"


class ServiceSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name="ServiceDetail", lookup_field='pk')
    class Meta:
        model = Service
        fields="__all__"

class FactureSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name="FactureDetail", lookup_field='pk')
    
    class Meta:
        model = Facture
        fields="__all__"


class RdvSerializer(serializers.ModelSerializer):
    url=serializers.HyperlinkedIdentityField(view_name="RdvDetail", lookup_field='pk')
    
    class Meta:
        model = RendezVous
        fields="__all__"
