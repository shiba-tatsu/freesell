<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Category = new Category();
        $accessories = $Category->create(['name' => 'アクセサリー']);
        $mask = $Category->create(['name' => 'マスク']);
        $bag = $Category->create(['name' => 'バッグ・財布・小物']);
        $sumaphoCase = $Category->create(['name' => 'スマホケース・モバイルグッズランキング']);
        $furniture = $Category->create(['name' => '家具・生活雑誌']);
        $stationery = $Category->create(['name' => '文房具・ステーショナリー']);
        $knitting = $Category->create(['name' => 'ニット・編み物']);
        $pottery = $Category->create(['name' => '陶器・ガラス・食器']);
        $art = $Category->create(['name' => 'アート・写真']);
        $baby = $Category->create(['name' => 'ベビー・キッズ']);
        $doll = $Category->create(['name' => 'ぬいぐるみ・人形']);
        $toy = $Category->create(['name' => 'おもちゃ']);
        $pedGoods = $Category->create(['name' => 'ペットグッズ']);
        $aroma = $Category->create(['name' => 'アロマキャンドル']);
        $flowerGarden = $Category->create(['name' => 'フラワー・ガーデン']);
        $materials = $Category->create(['name' => '素材・道具']);
        $handmade = $Category->create(['name' => '手作りキット']);
        $food = $Category->create(['name' => '食べ物']);
        
        $accessoriesChildren = array (
            '指輪・リング',
            'ピアス',
            'イヤリング',
            'イヤーカフ・イヤーフック',
            'ネックレス',
            'ブレスレット',
            'ヘアアクセサリー',
            'コサージュ・ブローチ',
            'バレッタ・ヘアクリップ',
            'ヘアバンド',
            'シュシュ',
            'ヘアゴム',
            'ポニーフック',
            'ヘアピン',
            'アンクレット',
            'かんざし',
            '腕時計',
            'ネクタイピン',
            'キーホルダー・ストラップ',
            'その他'
        );
        foreach($accessoriesChildren as $accessoriesChild){
            $accessories->children()->create(['name' => $accessoriesChild]);
        }

        $maskChildren = array (
            '大人用マスク',
            '子供用マスク',
            'マスクカバー',
            'インナーマスク',
            'マスクケース',
            'マスクホルダー・キャッチ',
            '手作りキット',
            '素材',
            'その他'
        );
        foreach($maskChildren as $maskChild){
            $mask->children()->create(['name' => $maskChild]);
        }

        $bagChildren = array (
            'バッグ',
            'トートバッグ',
            'ショルダーバッグ',
    		'バックパック・リュック',
            'ボストンバッグ',
    		'ハンドバッグ',
    		'クラッチバッグ',
            'かごバッグ',
            'ポーチ',
            'メガネケース',
            'ティッシュケース',
            '財布',
            'コインケース',
            '名刺・カードケース',
    		'キーケース',
    		'バッグチャーム',
    		'その他'
        );
        foreach($bagChildren as $bagChild){
            $bag->children()->create(['name' => $bagChild]);
        }

        $sumaphoCaseChildren = array (
            'スマホケース',
     		'手帳型スマホケース',
     		'スマホリング',
     		'イヤホンジャック',
     		'ストラップ',
     		'コードホルダー',
     		'モバイルバッテリー',
     		'スマホポーチ',
     		'スマホスタンド',
     		'スマホスピーカー',
     		'PC・タブレットケース',
     		'その他'
        );
        foreach($sumaphoCaseChildren as $sumaphoCaseChild){
            $sumaphoCase->children()->create(['name' => $sumaphoCaseChild]);
        }

        $furnitureChildren = array (
            '家具',
     		'テーブル・デスク',
     		'チェア・椅子',
     		'クッション',
     		'収納家具',
    		'本棚・マガジンラック',
    		'テレビ台',
     		'照明',
     		'インテリア雑貨',
     		'時計',
    		'表札・ネームプレート',
    		'玄関用品',
    		'バス・トイレ・洗面用品',
     		'掃除用品',
    		'ゴミ箱',
     		'小物入れ・かご',
     		'アクセサリー収納',
     		'鏡・ドレッサー',
     		'カーテン',
    		'ラグ・マット',
     		'ティッシュケース・カバー',
     		'花瓶・一輪挿し',
     		'フォトフレーム',
    		'置物',
    		'ウォールステッカー・デコ',
    		'ガーランド',
    		'タペストリー',
    		'サンキャッチャー',
    		'モビール',
    		'キッチン小物',
    		'箸置き',
    		'コースター',
    		'その他'
        );
        foreach($furnitureChildren as $furnitureChild){
            $furniture->children()->create(['name' => $furnitureChild]);
        }

        $stationeryChildren = array (
            'ノート・メモ帳',
     		'ペンケース',
     		'ペン・筆記用具',
     		'カード・レター・ラッピング',
     		'シール・ステッカー',
     		'マスキングテープ',
    		'ペーパークラフト',
     		'はんこ',
     		'ブックカバー',
    		'しおり・ブックマーカー',
    		'マグネット',
     		'カレンダー',
     		'その他'
        );
        foreach($stationeryChildren as $stationeryChild){
            $stationery->children()->create(['name' => $stationeryChild]);
        }

        $knittingChildren = array (
            '帽子・マフラー・手袋・靴下',
     		'セーター・カーディガン',
    		'刺繍・ステッチ',
     		'キルト・パッチワーク',
     		'その他'
        );
        foreach($knittingChildren as $knittingChild){
            $knitting->children()->create(['name' => $knittingChild]);
        }

        $potteryChildren = array (
            '陶器',
     		'ガラス工芸',
     		'食器',
     		'その他'
        );
        foreach($potteryChildren as $potteryChild){
            $pottery->children()->create(['name' => $potteryChild]);
        }

        $artChildren = array (
            '絵画',
     		'イラスト',
     		'写真',
     		'グラフィック',
     		'版画・彫刻',
     		'書道',
     		'オブジェ・立体物',
     		'ZINE・リトルプレス',
     		'その他'
        );
        foreach($artChildren as $artChild){
            $art->children()->create(['name' => $artChild]);
        }

        $babyChildren = array (
            '子供服',
     		'ベビー服',
    		'スタイ・よだれかけ',
     		'着物・浴衣・甚平',
     		'帽子',
     		'靴',
     		'ヘアアクセサリー',
     		'移動ポケット',
    		'ファッション小物',
    		'おくるみ・ブランケット',
     		'おもちゃ',
     		'おでかけママアイテム',
     		'母子手帳ケース',
     		'マタニティ',
     		'命名書',
     		'メモリアル・記念品',
     		'食器・インテリア',
     		'エプロン・スモック',
     		'ワッペン',
     		'お名前シール',
     		'お名前スタンプ',
     		'入園入学セット',
     		'レッスンバッグ',
    		'上履き入れ',
     		'ランドセルカバー',
     		'お弁当袋・ランチョンマット',
     		'水筒・肩紐カバー',
     		'巾着',
     		'ハンカチ',
     		'その他'
        );
        foreach($babyChildren as $babyChild){
            $baby->children()->create(['name' => $babyChild]);
        }

        $dollChildren = array (
            'ぬいぐるみ',
    		'あみぐるみ',
     		'人形',
     		'フェルト',
    		'着せ替え服',
     		'その他'
        );
        foreach($dollChildren as $dollChild){
            $doll->children()->create(['name' => $dollChild]);
        }

        $toyChildren = array (
            'フィギュア',
    		'ミニチュア',
     		'知育玩具',
     		'その他'
        );
        foreach($toyChildren as $toyChild){
            $toy->children()->create(['name' => $toyChild]);
        }

        $pedGoodsChildren = array (
            'ウェア',
     		'首輪・リード',
     		'アクセサリー',
     		'おもちゃ',
     		'その他'
        );
        foreach($pedGoodsChildren as $pedGoodsChild){
            $pedGoods->children()->create(['name' => $pedGoodsChild]);
        }

        $aromaChildren = array (
            'アロマ',
     		'キャンドル',
    		'アロマ・キャンドルホルダー',
    		'その他'
        );
        foreach($aromaChildren as $aromaChild){
            $aroma->children()->create(['name' => $aromaChild]);
        }

        $flowerGardenChildren = array (
            'リース',
            'しめ縄・しめ飾り',
            'スワッグ',
            'アレンジメント',
            'ハーバリウム',
            '観葉植物',
            'ブーケ',
            'ドライフラワー',
            'プリザーブドフラワー',
            'プランター・植木鉢',
            'その他'
        );
        foreach($flowerGardenChildren as $flowerGardenChild){
            $flowerGarden->children()->create(['name' => $flowerGardenChild]);
        }

        $materialsChildren = array (
            '各種パーツ',
     		'チャーム',
     		'ビジュー・クリスタル',
     		'樹脂・レジン',
     		'ビーズ',
    		'ボタン',
     		'パール',
    		'天然石',
     		'シェル',
     		'金具・チェーン',
     		'生地・糸',
    		'ワッペン・アップリケ',
    		'花材',
    		'リボン・テープ',
    		'型紙・パターン',
     		'道具',
     		'梱包材・台紙',
     		'その他'
        );
        foreach($materialsChildren as $materialsChild){
            $materials->children()->create(['name' => $materialsChild]);
        }

        $handmadeChildren = array (
            'アクセサリー',
     		'財布・ポーチ',
     		'バッグ',
     		'ファッション',
     		'ベビー・子供用品',
     		'和小物',
     		'インテリア・飾り',
     		'フラワー・グリーン',
     		'人形・ミニチュア',
     		'写真・アルバム',
     		'その他'
        );
        foreach($handmadeChildren as $handmadeChild){
            $handmade->children()->create(['name' => $handmadeChild]);
        }

        $foodChildren = array (
            'パン',
     		'お米・餅・パスタ',
    		'グラノーラ・ドライフルーツ',
     		'クッキー・焼き菓子',
     		'ケーキ',
     		'スイーツ・お菓子',
     		'コーヒー',
     		'お茶・ジュース',
     		'ジャム・シロップ',
     		'チーズ・乳製品',
     		'調味料・スパイス',
     		'精肉・肉加工品',
     		'魚介類・水産加工品',
     		'おつまみ・惣菜',
     		'ピクルス・梅干・ふりかけ',
     		'野菜・フルーツ'
        );
        foreach($foodChildren as $foodChild){
            $food->children()->create(['name' => $foodChild]);
        }
    }
}
