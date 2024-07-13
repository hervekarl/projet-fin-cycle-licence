from rest_framework import serializers
from .models import *
from .validations import *

class PatientSerialiser(serializers.ModelSerializer):
    photo_patient=serializers.ImageField(validators=[valide])
    url=serializers.HyperlinkedIdentityField(view_name='detail', lookup_field='pk')
    nom_patient=serializers.CharField()
    prenom_patient=serializers.CharField()
    date_nais_pat=serializers.DateField()
    age_patient=serializers.IntegerField()
    sexe_patient = serializers.CharField()
    adresse_patient = serializers.CharField()
    tel_patient = serializers.CharField(validators=[validate_tel])
    class Meta:
       model=Patient
       fields='__all__'

    
   