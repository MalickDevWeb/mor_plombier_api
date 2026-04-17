<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Support\Str;

class PlumbingSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing data
        Product::truncate();
        Service::truncate();
        Category::truncate();

        // 1. Categories
        $catPlomberie = Category::create([
            'name' => 'Équipement Sanitaire',
            'slug' => 'equipement-sanitaire',
            'type' => 'product'
        ]);

        $catSolaire = Category::create([
            'name' => 'Énergie Solaire',
            'slug' => 'energie-solaire',
            'type' => 'product'
        ]);

        $catTools = Category::create([
            'name' => 'Outillage Pro',
            'slug' => 'outillage-pro',
            'type' => 'product'
        ]);

        $catServiceRes = Category::create([
            'name' => 'Résidentiel',
            'slug' => 'residentiel',
            'type' => 'service'
        ]);

        $catServiceInd = Category::create([
            'name' => 'Industriel',
            'slug' => 'industriel',
            'type' => 'service'
        ]);

        $catDetails = Category::create([
            'name' => 'Quincaillerie & Détails',
            'slug' => 'quincaillerie-details',
            'type' => 'product'
        ]);

        $catTuyauterie = Category::create([
            'name' => 'Tuyauterie & PVC',
            'slug' => 'tuyauterie-pvc',
            'type' => 'product'
        ]);

        // 2. Products
        Product::create([
            'category_id' => $catSolaire->id,
            'name' => 'Chauffe-eau Solaire Dakar Luxe',
            'slug' => 'chauffe-eau-solaire-dakar-luxe',
            'description' => 'Système solaire haute performance SolarTech Dakar. Capacité 300L, idéal pour les villas aux Mamelles et Almadies. Garantie 10 ans.',
            'image_url' => '/image/seeder/premium_water_heater_dakar_1776394534394.png',
            'price' => 850000,
            'stock' => 5
        ]);

        Product::create([
            'category_id' => $catPlomberie->id,
            'name' => 'Robinetterie Or & Noir brossé',
            'slug' => 'robinetterie-or-noir-brosse',
            'description' => 'Mitigeur de luxe Rousseau Gold & Noir. Design architectural moderne pour salles de bain premium. Finition inaltérable.',
            'image_url' => '/image/seeder/luxury_gold_faucet_display_1776394550047.png',
            'price' => 125000,
            'stock' => 12
        ]);

        Product::create([
            'category_id' => $catTools->id,
            'name' => 'Mallette Plomberie Expert Rigid',
            'slug' => 'mallette-plomberie-expert-rigid',
            'description' => 'Set complet d’outillage professionnel Rigid pour plombiers exigeants. Inclut coupe-tubes, clés suédoises et alésoirs.',
            'image_url' => '/image/seeder/pro_plumbing_toolkit_senegal_1776394568319.png',
            'price' => 245000,
            'stock' => 8
        ]);

        Product::create([
            'category_id' => $catTuyauterie->id,
            'name' => 'Tuyau PVC Pression 50mm (Barre 6m)',
            'slug' => 'tuyau-pvc-pression-50mm',
            'description' => 'Tube PVC rigide haute pression spécial adduction d\'eau potable. Validé par les normes sénégalaises. Qualité supérieure garantie.',
            'image_url' => '/image/seeder/pvc_fittings.png',
            'price' => 12500,
            'stock' => 150
        ]);

        Product::create([
            'category_id' => $catTuyauterie->id,
            'name' => 'Coude PVC 90° Femelle/Femelle Ø32',
            'slug' => 'coude-pvc-90-ff-32',
            'description' => 'Coude PVC évacuation 90 degrés. Collage facile, résistance accrue aux chocs thermiques.',
            'image_url' => '/image/seeder/pvc_fittings.png',
            'price' => 450,
            'stock' => 500
        ]);

        Product::create([
            'category_id' => $catTuyauterie->id,
            'name' => 'Té PVC Égal Ø40',
            'slug' => 'te-pvc-egal-40',
            'description' => 'Té PVC à 90° pour dérivation de réseaux d\'évacuation des eaux.',
            'image_url' => '/image/seeder/pvc_fittings.png',
            'price' => 600,
            'stock' => 300
        ]);

        Product::create([
            'category_id' => $catPlomberie->id,
            'name' => 'Vanne à Sphère Laiton (1 Pouce)',
            'slug' => 'vanne-sphere-laiton-1p',
            'description' => 'Vanne d\'arrêt à boisseau sphérique en laiton massif. Résistante à la corrosion, idéale pour l\'arrivée d\'eau principale.',
            'image_url' => '/image/seeder/brass_valves.png',
            'price' => 8500,
            'stock' => 45
        ]);

        Product::create([
            'category_id' => $catPlomberie->id,
            'name' => 'Compteur d\'Eau Divisionnaire DN20',
            'slug' => 'compteur-eau-divisionnaire-dn20',
            'description' => 'Compteur divisionnaire pour appartement avec lecture facile des mètres cubes. Précision garantie pour facturation interne.',
            'image_url' => '/image/seeder/brass_valves.png',
            'price' => 22000,
            'stock' => 20
        ]);

        Product::create([
            'category_id' => $catPlomberie->id,
            'name' => 'Clapet Anti-retour Laiton 3/4"',
            'slug' => 'clapet-anti-retour-laiton-34',
            'description' => 'Clapet anti-pollution toutes positions avec ressort inox et obturateur laiton.',
            'image_url' => '/image/seeder/brass_valves.png',
            'price' => 5500,
            'stock' => 60
        ]);

        Product::create([
            'category_id' => $catDetails->id,
            'name' => 'Rouleau Teflon Pro (Étancheité)',
            'slug' => 'rouleau-teflon-pro',
            'description' => 'Ruban d\'étanchéité PTFE de qualité professionnelle pour raccordements filetés. Lot de 3 rouleaux.',
            'image_url' => '/image/seeder/details_teflon.png',
            'price' => 1500,
            'stock' => 200
        ]);

        Product::create([
            'category_id' => $catDetails->id,
            'name' => 'Joint Torique (Lot de 50)',
            'slug' => 'joint-torique-lot-50',
            'description' => 'Assortiment de joints toriques en caoutchouc NBR résistant à la chaleur et aux produits chimiques.',
            'image_url' => '/image/seeder/details_teflon.png',
            'price' => 3500,
            'stock' => 80
        ]);

        Product::create([
            'category_id' => $catDetails->id,
            'name' => 'Pâte à Joint (Tubétanche) 50ml',
            'slug' => 'pate-a-joint-50ml',
            'description' => 'Résine d\'étanchéité filetée anaérobie spéciale pour raccords métalliques. Durcissement rapide.',
            'image_url' => '/image/seeder/details_teflon.png',
            'price' => 9500,
            'stock' => 40
        ]);

        Product::create([
            'category_id' => $catDetails->id,
            'name' => 'Colle PVC Pression Tangit',
            'slug' => 'colle-pvc-tangit',
            'description' => 'Colle polymère spéciale pour raccordements de tuyaux et raccords PVC rigides. Prise rapide.',
            'image_url' => '/image/seeder/details_teflon.png',
            'price' => 6500,
            'stock' => 65
        ]);


        // 3. Services
        Service::create([
            'category_id' => $catServiceRes->id,
            'title' => 'Réparation de Fuite Express',
            'slug' => 'reparation-fuite-express',
            'description' => 'Intervention rapide 24h/7 pour toute fuite d\'eau domestique ou commerciale. Détection et réparation sur place par nos experts. Devis gratuit sur site.',
            'image_url' => '/image/seeder/service_fuite.png',
            'price_indicator' => 'À partir de 25 000 FCFA'
        ]);

        Service::create([
            'category_id' => $catServiceRes->id,
            'title' => 'Installation Chauffe-eau & Solaire',
            'slug' => 'installation-chauffe-eau-solaire',
            'description' => 'Pose et mise en service de chauffe-eau électrique ou solaire. Raccordements cuivre garantis 3 ans. Intervention à Mbour, Dakar et dans toutes les régions du Sénégal.',
            'image_url' => '/image/seeder/service_chauffe_eau.png',
            'price_indicator' => 'À partir de 45 000 FCFA'
        ]);

        Service::create([
            'category_id' => $catServiceRes->id,
            'title' => 'Rénovation Salle de Bain de Luxe',
            'slug' => 'renovation-salle-de-bain-luxe',
            'description' => 'Transformation complète de vos espaces d\'eau avec pose de matériaux nobles et raccordements haute précision. Carrelage, sanitaires, robinetterie : tout inclus.',
            'image_url' => '/image/seeder/plumber_working.png',
            'price_indicator' => 'Sur Devis'
        ]);

        Service::create([
            'category_id' => $catServiceInd->id,
            'title' => 'Grands Chantiers & Réseaux Industriels',
            'slug' => 'grands-chantiers-reseaux-industriels',
            'description' => 'Installation de réseaux hydrauliques complexes pour immeubles, hôtels, hôpitaux et usines. Direction de chantier, lecture de plans et respect des normes ONAS.',
            'image_url' => '/image/seeder/service_chantier.png',
            'price_indicator' => 'Contact Pro'
        ]);

        Service::create([
            'category_id' => $catServiceInd->id,
            'title' => 'Maintenance Réseau Incendie (RIA)',
            'slug' => 'maintenance-reseau-incendie',
            'description' => 'Audit, installation et maintenance de vos systèmes RIA et colonnes sèches pour immeubles et entrepôts. Certification conforme à la réglementation sénégalaise.',
            'image_url' => '/image/seeder/technician_group.png',
            'price_indicator' => 'Contact Pro'
        ]);

    }
}
