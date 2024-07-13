# Generated by Django 3.2.5 on 2024-07-07 21:24

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('Save', '0001_initial'),
    ]

    operations = [
        migrations.AlterField(
            model_name='batiment',
            name='photo_batiment',
            field=models.ImageField(default=None, null=True, upload_to='./IS/batiment'),
        ),
        migrations.AlterField(
            model_name='equipement',
            name='photo_equip',
            field=models.ImageField(default=None, null=True, upload_to='./IS/equipement'),
        ),
        migrations.AlterField(
            model_name='salle',
            name='photo_salle',
            field=models.ImageField(default=None, null=True, upload_to='./IS/salle'),
        ),
    ]
