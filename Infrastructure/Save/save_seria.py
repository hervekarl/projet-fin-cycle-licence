from rest_framework import serializers
from .models import *

class BatimentSerializer(serializers.ModelSerializer):
    url = serializers.HyperlinkedIdentityField(view_name="batimentDetail", lookup_field="pk")
    
    class Meta:
        model = Batiment
        fields = '__all__'

class SalleSerializer(serializers.ModelSerializer):
    url = serializers.HyperlinkedIdentityField(view_name="salleDetail", lookup_field='pk')
    
    class Meta:
        model = Salle
        fields = '__all__'

class NiveauSerializer(serializers.ModelSerializer):
    url = serializers.HyperlinkedIdentityField(view_name="niveauDetail", lookup_field='pk')
    
    class Meta:
        model = Niveau
        fields = '__all__'

class EquipementSerializer(serializers.ModelSerializer):
    url = serializers.HyperlinkedIdentityField(view_name="detailEquipement", lookup_field='pk')
    
    class Meta:
        model = Equipement
        fields = '__all__'

class PossederSerializer(serializers.ModelSerializer):
    url = serializers.HyperlinkedIdentityField(view_name="posseder", lookup_field='pk')
    
    class Meta:
        model = Posseder
        fields = '__all__'
